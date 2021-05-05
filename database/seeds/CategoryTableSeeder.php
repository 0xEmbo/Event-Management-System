<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = new Category();
        $category2 = new Category();
        $category3 = new Category();

        $category1->name = 'category1';
        $category2->name = 'category2';
        $category3->name = 'category3';

        $category1->save();
        $category2->save();
        $category3->save();
    }
}
