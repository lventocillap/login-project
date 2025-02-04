<?php

namespace Database\Seeders;

use App\Enums\ProductEnum;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (ProductEnum::cases() as $product) {
            Product::create([
                'name' => $product->value,
                'amount'=> $product->amount(),
                'category' => $product->category(),
                'date'=> $product->date(),
                'price' => $product->price()
            ]);
        }
    }
}
