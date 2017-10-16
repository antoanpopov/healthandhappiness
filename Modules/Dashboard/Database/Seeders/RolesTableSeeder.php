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

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dashboard_roles')->insert([
            ['id' => 1, 'name' => 'Editor', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => 2, 'name' => 'Translator', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => 3, 'name' => 'Both', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
        ]);
    }
}
