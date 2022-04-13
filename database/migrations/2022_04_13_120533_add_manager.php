<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AddManager extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $managerData = [
            'name' => 'Manager',
            'email' => env('MANAGER_LOGIN'),
            'email_verified_at' => now(),
            'password' => Hash::make(env('MANAGER_PASSWORD')),
            'remember_token' => Str::random(10)
        ];

        $manager = new User($managerData);
        $manager->role_id = 2;
        $manager->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
