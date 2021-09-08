<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;

class PackageTableSeeder extends Seeder {

    public function run()
    {
        Package::truncate();

        Package::create(['size' => 250]);
        Package::create(['size' => 500]);
        Package::create(['size' => 1000]);
        Package::create(['size' => 2000]);
        Package::create(['size' => 5000]);
    }

}