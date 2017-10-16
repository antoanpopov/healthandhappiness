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

class ExpertiseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('dashboard_expertise')->insert([
            ['id' => '1', 'name' => 'Legal', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '2', 'name' => 'Financial', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '3', 'name' => 'IT', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '4', 'name' => 'Marketing', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '5', 'name' => 'Medical', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '6', 'name' => 'Parmaceutical', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '7', 'name' => 'Technical', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
        ]);
    }
}
