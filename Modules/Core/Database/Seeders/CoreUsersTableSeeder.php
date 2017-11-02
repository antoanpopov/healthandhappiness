<?php
/**
 * Created by PhpStorm.
 * User: Antoan Popov <antoanpopoff@gmail.com>
 * Date: 9.10.2017 г.
 * Time: 16:39
 */

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Seeder;

class CoreUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::truncate();
        factory(\App\User::class)->create([
            'id' => 1,
            'name' => 'Antoan Popov',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);
        factory(\App\User::class)->create([
            'id' => 2,
            'name' => 'Светлана Попова',
            'email' => 'svenika@abv.bg',
            'password' => bcrypt('12SvenikA34'),
        ]);
    }
}
