<?php

use App\Room;

use Illuminate\Database\Seeder;

class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $room1 = new Room();
        $room2 = new Room();
        $room3 = new Room();
        $room4 = new Room();
        $room5 = new Room();
        $room6 = new Room();
        $room7 = new Room();
        $room8 = new Room();
        $room9 = new Room();
        $room10 = new Room();

        $room1->rate = 0;
        $room1->capacity = 100;
        $room1->price_per_hour = 100;

        $room2->rate = 0;
        $room2->capacity = 100;
        $room2->price_per_hour = 90;

        $room3->rate = 0;
        $room3->capacity = 100;
        $room3->price_per_hour = 80;

        $room4->rate = 0;
        $room4->capacity = 50;
        $room4->price_per_hour = 40;

        $room5->rate = 0;
        $room5->capacity = 50;
        $room5->price_per_hour = 45;

        $room6->rate = 0;
        $room6->capacity = 50;
        $room6->price_per_hour = 35;

        $room7->rate = 0;
        $room7->capacity = 45;
        $room7->price_per_hour = 35;

        $room8->rate = 0;
        $room8->capacity = 25;
        $room8->price_per_hour = 25;

        $room9->rate = 0;
        $room9->capacity = 25;
        $room9->price_per_hour = 20;

        $room10->rate = 0;
        $room10->capacity = 15;
        $room10->price_per_hour = 10;

        $room1->save();
        $room2->save();
        $room3->save();
        $room4->save();
        $room5->save();
        $room6->save();
        $room7->save();
        $room8->save();
        $room9->save();
        $room10->save();
    }
}
