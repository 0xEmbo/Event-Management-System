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
        $conference = new Category();
        $workshop = new Category();
        $seminar = new Category();
        $meeting = new Category();
        $other = new Category();

        $conference->name = 'Conference';
        $workshop->name = 'Workshop';
        $seminar->name = 'Seminar';
        $meeting->name = 'Meeting';
        $other->name = 'other';

        $conference->save();
        $workshop->save();
        $seminar->save();
        $meeting->save();
        $other->save();
    }
}
