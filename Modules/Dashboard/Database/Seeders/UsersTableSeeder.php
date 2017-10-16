<?php
/**
 * Created by PhpStorm.
 * User: Antoan Popov <antoanpopoff@gmail.com>
 * Date: 9.10.2017 г.
 * Time: 16:39
 */
namespace Modules\Dashboard\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['id' => '1', 'name' => 'Antoan Popov', 'email' => 'admin@gmail.com','password' => '$2a$04$BpREbMXY0E6rR0jAAzbTHOwC8S7kFz5l8EgQc7USHzn8Og9eNrjO2', 'created_at' => date('Y-m-d H:i:s'),],
        ]);
    }
}
