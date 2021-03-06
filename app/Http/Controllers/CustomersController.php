<?php namespace App\Http\Controllers;

use App\ActiveCustomer;
use App\BeaconMajor;
use App\Http\Requests;
use App\Repositories\CustomerRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as BaseCollection;

class CustomersController extends Controller
{

    private $customerRepo;

    public function __construct(CustomerRepositoryInterface $customerRepo)
    {
        $this->customerRepo = $customerRepo;
    }

    public function accountStatus(Request $request)
    {
        if (!$request->has('email')) {
            return $this->badRequest();
        }
        $customer = $this->customerRepo->getCustomerFromEmail($request->input('email'));
        if (empty($customer)) {
            $r['result'] = 'NOT_A_MEMBER';
        } else {
            if (!$customer->havePassword) {
                $r['result'] = 'DONT_HAVE_PASSWORD';
            } else {
                $r['result'] = 'HAVE_PASSWORD';
            }
        }
        return response()->json($r);
    }

    public function getSettings(ActiveCustomer $customer)
    {
        return response()->json([
            'min_entrance_value' => $customer->getMinEntranceDiscountValue(),
            'min_entrance_rate' => $customer->getMinEntranceDiscountRate(),
            'min_aisle_value' => $customer->getMinDiscountValue(),
            'min_aisle_rate' => $customer->getMinDiscountRate(),
        ]);
    }

    public function storeSettings(Request $request, ActiveCustomer $customer)
    {
        $keys = ['min_entrance_value', 'min_entrance_rate', 'min_aisle_value', 'min_aisle_rate'];
        foreach ($keys as $k) {
            if ($request->has($k)) {
                $customer->$k = $request->input($k);
            }
        }
        $customer->save();
        return response()->json([
            'result' => true
        ]);
    }

    public function personalInfo(ActiveCustomer $customer)
    {
        return $this->customerRepo->getCustomerInfo($customer->id);
    }

    public function recentMajors(ActiveCustomer $customer)
    {
        $from = Carbon::now()->subMonths(config('preload-info.recent_num_months'))->toDateString();
        $transactions = $this->customerRepo->getShoppingHistory($customer->id, $from);
        $storesTrans = Collection::make($transactions)->groupBy('store_id');
        $recentMajors = $storesTrans->map(function ($trans, $key) {
            $lastVisited = BaseCollection::make($trans)->reduce(function ($result, $item) {
                return (is_null($result) || $item['time'] > $result) ? $item['time'] : $result;
            });
            $storeID = 'S_' . $key;
            $s['major'] = BeaconMajor::where('store_id', $storeID)->first()->major;
            $s['last_visited'] = $lastVisited;
            return $s;
        });
        return response()->json($recentMajors);
    }
}
