<?php


use Illuminate\Database\Seeder;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Alessandro Rogério Mieli',
            'email' => 'ale@ale.com.br',
            'password' => bcrypt('123456')
        ]);
    }
}
