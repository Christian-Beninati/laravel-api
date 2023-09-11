<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Chrisian';
        $user->email = 'christianbeninati.info@gmail.com';
        $user->password = bcrypt('sphNw8W*Ge8x*Vc');
        $user->save();
    }
}
