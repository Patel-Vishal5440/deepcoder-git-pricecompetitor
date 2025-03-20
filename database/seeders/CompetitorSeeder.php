<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Competitor;

class CompetitorSeeder extends Seeder
{
    public function run()
    {
            Competitor::insert([
                    [
                        'name' => 'PhoneICDParts',
                        'website' => 'https://www.phonelcdparts.com',
                        'shortname' => 'PLCD',
                        'price_class_name' => 'price-final_price',
                        'status' => 'active'
                    ],
                    [
                        'name' => 'InjuredGadgets',
                        'website' => 'https://injuredgadgets.com',
                        'shortname' => 'IGadgets',
                        'price_class_name' => 'price-final_price',
                        'status' => 'active'
                    ],
                    [
                        'name' => 'MobileSentrix',
                        'website' => 'https://mobilesentrix.com',
                        'shortname' => 'MSentrix',
                        'price_class_name' => 'price-box',
                        'status' => 'active'
                    ]
            ]);
    }
}
