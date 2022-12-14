<?php

namespace Database\Seeders;

use App\Models\AcePrice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AcePrice::truncate();
        AcePrice::create([
            'item' => 'RSD150',
            'qty' => '1',
            'unit_price' => '24.66',
            'unit_of_measure' => 'FT',
            'description' => '1 1/2" Blue discharge',
            'bulk_price' => '21.45',
            'bulk_unit_of_measure' => 'FT',
            'coil_length' => '100',
            'assembly_charge' => '',
            'net_price' => '13.316',
            'factory_assembly' => 1
        ]);
    }
}
