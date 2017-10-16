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

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dashboard_languages')->insert([
            ['id' => '1', 'name' => 'English', 'flag' => 'England.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '2', 'name' => 'Bulgarian', 'flag' => 'Bulgaria.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '3', 'name' => 'Russian', 'flag' => 'Russia.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '4', 'name' => 'German', 'flag' => 'Germany.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '5', 'name' => 'Croatian', 'flag' => 'Croatia.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '6', 'name' => 'Czech', 'flag' => 'Czech-Republic.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '7', 'name' => 'Danish', 'flag' => 'Denmark.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '8', 'name' => 'Dutch', 'flag' => 'Netherlands.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '9', 'name' => 'Finnish', 'flag' => 'Finland.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '10', 'name' => 'French', 'flag' => 'France.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '11', 'name' => 'Greek', 'flag' => 'Greece.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '12', 'name' => 'Hungarian', 'flag' => 'Hungary.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '13', 'name' => 'Italian', 'flag' => 'Italy.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '14', 'name' => 'Icelandig', 'flag' => 'Iceland.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '15', 'name' => 'Kazakh', 'flag' => 'Kazakhstan.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '16', 'name' => 'Latin', 'flag' => 'Malta.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '17', 'name' => 'Latvian', 'flag' => 'Latvia.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '18', 'name' => 'Norwegian', 'flag' => 'Norway.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '19', 'name' => 'Polish', 'flag' => 'Poland.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '20', 'name' => 'Portugese', 'flag' => 'Portugal.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '21', 'name' => 'Romanian', 'flag' => 'Romania.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '22', 'name' => 'Russian', 'flag' => 'Russia.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '23', 'name' => 'Serbian', 'flag' => 'Serbia.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '24', 'name' => 'Slovak', 'flag' => 'Slovenia.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '25', 'name' => 'Spanish', 'flag' => 'Spain.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '26', 'name' => 'Swedish', 'flag' => 'Sweden.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '27', 'name' => 'Turkish', 'flag' => 'Turkey.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1],
            ['id' => '28', 'name' => 'Ukrainian', 'flag' => 'Ukraine.png', 'created_at' => date('Y-m-d H:i:s'), 'created_by' => 1]
        ]);
    }
}
