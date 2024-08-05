<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 20; $i++) {
            DB::table('pr')->insert([
                'title' => $faker->text(20),
                'image' =>'https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcRKIT7wqvm3bGeBh0lmN3zLiD2qyDFPt0jsSNDDDVMcTYagbGMKMT9q-yAkDvjDUGKPk2KPVYijKbWMdSMiQzyIYWtOnNGmNDFuUv9hU6kLkjwFU7IvEF_eih8_o5zqrMgFVF_xwR8&usqp=CAc',
                'price' => rand(100,1000),
                'priceDel' =>rand(1000,1500),
                'category_id' =>rand(1,3)
            ]);
        }
    }
}
