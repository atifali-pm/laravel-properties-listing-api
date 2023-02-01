<?php

namespace Database\Seeders;

use App\Models\PropertyCharacteristic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertyCharacteristicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PropertyCharacteristic::factory()->count(2)->create();

    }
}
