<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product=new Product([
            'imagePath'=> 'images/1.jpg',
            'title'=>'chilli',
            'description'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt, sint? Est assumenda quae eveniet nam quaerat molestiae, ad beatae, excepturi iusto soluta, accusamus eius aspernatur eos dolorum optio iste totam?',
            'price'=>40
            ]);
        $product->save();
    }
}
