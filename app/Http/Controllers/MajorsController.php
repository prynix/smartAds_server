<?php namespace App\Http\Controllers;

use App\BeaconMajor;
use App\Http\Requests;
use App\Http\Requests\MajorRequest;
use Illuminate\Http\Request;
use Lang;
use Laracasts\Flash\Flash;

class MajorsController extends Controller
{

    public function manage()
    {
        return view('majors.manage');
    }

    public function table(Request $request)
    {
        $MAJOR_COLUMNS = ['store', 'area', 'major', 'updated_at'];
        $r['draw'] = (int)$request->input('draw');
        $r['recordsTotal'] = BeaconMajor::count();
        $r['recordsFiltered'] = $r['recordsTotal'];
        if ($request->has('order')) {
            $order = $request->input('order');
            $orderColumn = $MAJOR_COLUMNS[$order[0]['column'] - 1];
            switch ($orderColumn) {
                case 'store':
                    $displays = BeaconMajor::join('stores', 'beacon_majors.store_id', '=', 'stores.id')->skip($request->input('start'))->take($request->input('length'))
                        ->orderBy('stores.name', $order[0]['dir'])->get();
                    break;
                case 'area':
                    $displays = BeaconMajor::join('stores', 'beacon_majors.store_id', '=', 'stores.id')->skip($request->input('start'))->take($request->input('length'))
                        ->orderBy('stores.display_area', $order[0]['dir'])->get();
                    break;
                default:
                    $displays = BeaconMajor::skip($request->input('start'))->take($request->input('length'))
                        ->orderBy($orderColumn, $order[0]['dir'])->get();
                    break;
            }
        } else {
            $displays = BeaconMajor::skip($request->input('start'))->take($request->input('length'))->orderBy('major', 'asc')->get();
        }

        $r['data'] = $displays->map(function ($major) {
            $store = $major->store;
            return [
                $store->name,
                $store->display_area,
                $major->major,
                $major->updated_at->format('m-d-Y'),
            ];
        });

        return response()->json($r);
    }

    public function deleteMulti(Request $request)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return abort('400');
        }
        BeaconMajor::destroy($ids);
    }

    public function create()
    {
        return view('majors.partials.create');
    }

    public function store(MajorRequest $request)
    {
        BeaconMajor::create($request->only(['major', 'store_id']));
        Flash::success(Lang::get('flash.add_success'));

        return redirect()->route('majors.create');
    }

    public function edit(BeaconMajor $major)
    {
        return view('majors.partials.edit')->with(compact('major'));
    }

    public function update(BeaconMajor $major, MajorRequest $request)
    {
        $newMajor = $request->input('major');
        if ($newMajor === $major->major) {
            $major->store_id = $request->input('store_id');
            $major->save();
        } else {
            $major->delete();
            BeaconMajor::create($request->only(['major', 'store_id']));
        }
        Flash::success(Lang::get('flash.edit_success'));
        return redirect()->route('majors.create');
    }
}
