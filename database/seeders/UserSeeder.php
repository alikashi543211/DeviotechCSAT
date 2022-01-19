<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            'name' => 'Admin',
            'email' => 'admin@csat.com',
            'email_verified_at' => '2020-08-07 17:00:00',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
            'status' => 'Active',
        ]);
        UserProfile::create(['user_id'=>$user->id]);
        $ops_user=User::create([
            'name' => 'Operational Manager',
            'email' => 'opsmanager@mail.com',
            'email_verified_at' => '2020-08-07 17:00:00',
            'password' => bcrypt('12345678'),
            'role' => 'ops_manager',
            'status' => 'Active',
        ]);
        UserProfile::create(['user_id'=>$ops_user->id]);
    }
}
