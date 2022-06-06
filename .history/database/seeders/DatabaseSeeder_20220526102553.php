<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      
       $this->call(TheLoaiModelSeeder::class);
        $this->call(LoaiTinModelSeeder::class);
       $this->call(TinTucModelSeeder::class);
       $this->call(RolesSeeder::class);
       $this->call(UsersSeeder::class);
       $this->call(PostsSeeder::class);
        
    }
}
