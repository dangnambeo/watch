<?php

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
        DB::table('user')->insert([
            'full_name' => 'Đăng Nam',
            'user_name' => 'admin',
            'phone' => '0123456789',
            'email' => 'dangnam@gmail.com',
            'role_id' => '0',
            'password' => bcrypt('123456'),
        ]);

        DB::table('role')->insert([
            ['name_role' => 'Admin'],
            ['name_role' => 'Staff']
        ]);

        DB::table('category')->insert([
            ['cate_tittle' => 'Sofa Giường'],
            ['cate_tittle' => 'Sofa Góc'],
            ['cate_tittle' => 'Sofa 2-3 chỗ ngồi'],
            ['cate_tittle' => 'Ghế thư giãn']
        ]);
    }
}
