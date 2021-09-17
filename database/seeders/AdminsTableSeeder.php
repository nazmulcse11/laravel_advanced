<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
            ['name'=>'Md.Admin','email'=>'admin@gmail.com','password'=>'123456'],
        ];
        Admin::insert($admins);
    }
}
