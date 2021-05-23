<?php

use Illuminate\Database\Seeder;

use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'test';
        $user->email = 'test@ems.com';
        $user->password = Hash::make('test');
        $user->company = 'Eventopedia';
        $user->bio = 'This is the test user bio!';
        $user->birthday = '1997-04-30';
        $user->address = 'Egypt, cairo';
        $user->phone = '0123456789';
        $user->save();
    }
}
