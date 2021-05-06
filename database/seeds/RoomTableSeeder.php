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

        $room1->capacity = 20;
        $room1->rate = 0;
        $room2->capacity = 20;
        $room2->rate = 0;
        $room3->capacity = 20;
        $room3->rate = 0;
        $room4->capacity = 20;
        $room4->rate = 0;
        $room5->capacity = 20;
        $room5->rate = 0;
        $room6->capacity = 20;
        $room6->rate = 0;
        $room7->capacity = 20;
        $room7->rate = 0;
        $room8->capacity = 20;
        $room8->rate = 0;
        $room9->capacity = 20;
        $room9->rate = 0;
        $room10->capacity = 20;
        $room10->rate = 0;

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
