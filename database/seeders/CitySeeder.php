<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;
use Illuminate\Support\Facades\Storage;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // City::truncate();
        $json = File::get('public/storage/assets/pk.json');
        // $json = Storage::disk('local')->get(storage_path() . '/assets/pk.json');
        // $json = File::get($json);
        $cities = collect(json_decode($json, true));
        // dd($cities);
        foreach ($cities as $city) {
            $new = new City();
            $new->create([
                'name' => $city['city'],
                'state' => $city['admin_name']
            ]);
        }
        // dd($cities);
    }
}
