<?php
/**
 * Created by PhpStorm.
 * User: Antoan Popov <antoanpopoff@gmail.com>
 * Date: 9.10.2017 г.
 * Time: 16:52
 */
namespace Modules\Dashboard\Database\Seeders;

use Illuminate\Database\Seeder;

class DashboardDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(LanguagesTableSeeder::class);
         $this->call(CatToolsTableSeeder::class);
         $this->call(ExpertiseTableSeeder::class);
         $this->call(RolesTableSeeder::class);
         $this->call(EditorsTableSeeder::class);
    }
}
