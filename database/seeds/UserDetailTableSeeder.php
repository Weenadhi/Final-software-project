<?php

use Illuminate\Database\Seeder;
use App\User_detail;
class UserDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User_detail::class,50)->create();
    }
}
