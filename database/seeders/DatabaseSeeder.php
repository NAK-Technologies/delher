<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\City;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);

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
        User::factory()->create([
            'name' => 'Dev',
            'email' => 'dev@dspss.com',
            'password' => Hash::make('@secret123'),
        ]);
    }
}
