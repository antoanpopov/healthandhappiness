<?php
/**
 * Created by PhpStorm.
 * User: Antoan Popov <antoanpopoff@gmail.com>
 * Date: 9.10.2017 г.
 * Time: 16:52
 */
namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Frontend\Entities\Category;

class CoreDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CoreUsersTableSeeder::class);
    }
}
