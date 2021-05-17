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
        $user->name = 'admin';
        $user->email = 'admin@ems.com';
        $user->password = Hash::make('admin');
        $user->company = 'Eventopedia';
        $user->bio = 'This is the admin bio!';
        $user->birthday = '1998-06-21';
        $user->address = 'Egypt, cairo';
        $user->phone = '0123456789';
        $user->save();
    }
}
