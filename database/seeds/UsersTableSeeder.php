<?php

use Illuminate\Database\Seeder;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('user')->insert([
            'username'=>'admin',
            'password'=>'047524920c1c56f5aea6b3608d010912',//admin123
            'salt'=>'abcd',
            'reg_time'=>time()
        ]);
    }
}
