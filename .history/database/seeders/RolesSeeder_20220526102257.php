<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author = Role::create([
            'name' => 'Phóng viên', 
            'slug' => 'author',
            'permissions' => [
                'post.create' => true,
            ]
        ]);
        $editor = Role::create([
            'name' => 'Biên tập viên', 
            'slug' => 'editor',
            'permissions' => [
                'post.update' => true,
                'post.publish' => true,
            ]
        ]);
    }
}
