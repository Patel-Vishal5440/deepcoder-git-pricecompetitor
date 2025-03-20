<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Hard Buttons (Power & Volume) For Samsung Galaxy S21 Ultra (Phantom Navy)',
            'default_code' => 'SP-S21U-HB-NV-PH',
            'list_price' => 1.1,
            'extra_data' => json_encode([]), // Empty JSON object
            'barcode' => '814167487636',
            'status' => 'active'
        ]);
    }
}
