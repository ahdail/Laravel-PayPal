<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

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
        	'name' 			=> 'T-Shirt '. uniqid(date('YmdHis')),
        	'description' 	=> 'Description Product '. uniqid(date('YmdHis')),
        	'image' 		=> public_path('assets/images/temp/tshirt.psd'),
        	'price' 		=> 10.5,
        ]);
        Product::create([
        	'name' 			=> 'T-Shirt '. uniqid(date('YmdHis')),
        	'description' 	=> 'Description Product '. uniqid(date('YmdHis')),
        	'image' 		=> url('assets/images/temp/tshirt.psd'),
        	'price' 		=> 20.5,
        ]);
        Product::create([
        	'name' 			=> 'T-Shirt '. uniqid(date('YmdHis')),
        	'description' 	=> 'Description Product '. uniqid(date('YmdHis')),
        	'image' 		=> 'tshirt.psd',
        	'price' 		=> 30.5,
        ]);
        Product::create([
        	'name' 			=> 'T-Shirt '. uniqid(date('YmdHis')),
        	'description' 	=> 'Description Product '. uniqid(date('YmdHis')),
        	'image' 		=> public_path('assets/images/temp/tshirt.psd'),
        	'price' 		=> 40.5,
        ]);
    }
}
