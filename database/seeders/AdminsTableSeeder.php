<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            ['name'=>'Md.Admin','email'=>'admin@gmail.com','password'=>Hash::make('123456')],
        ];
        Admin::insert($admins);
    }
}
