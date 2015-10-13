<?php

use App\Ads;
use App\Item;
use App\Store;
use App\WatchingList;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class AdsFaker extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 30) as $index) {
            if ($index % 2 == 0) {
                $start = $faker->dateTimeBetween('-3 month', '+1 week')->format('Y-m-d');
                $whole = true;
            } else {
                $start = $faker->dateTimeBetween('-5 day', 'now')->format('Y-m-d');
                $whole = false;
            }
            $ads = Ads::create([
                'title' => $faker->sentence(5),
                'start_date' => $start,
                'end_date' => Carbon::parse($start)->addWeek(1)->format('Y-m-d'),
                'is_promotion' => true,
                'is_whole_system' => $whole,
                'discount_value' => $faker->numberBetween(1000, 50000),
                'discount_rate' => $faker->numberBetween(1, 50),
                'image_display' => $faker->boolean(80),
                'provide_image_link' => true,
                'image_url' => $faker->url,
                'web_url' => $faker->url
            ]);
            $ads->items()->attach($faker->randomElement(Item::lists('id')));
            if (!$whole) {
                $ads->stores()->attach($faker->randomElement(Store::lists('id')));
            }
        }
    }

}