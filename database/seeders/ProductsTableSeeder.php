<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Corte',
            'price' => 85.00,
            'category_id' => 1,
            'image_path' => '1.png'
        ]);

        
    }
}
