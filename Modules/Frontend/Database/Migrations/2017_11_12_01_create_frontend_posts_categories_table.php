<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrontendPostsCategoriesTable extends Migration
{
    private $table = 'frontend_posts_categories';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            //foreign keys
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('frontend_categories')->after('id')->onUpdate('cascade')->onDelete('set null');
            $table->integer('post_id')->unsigned()->nullable();
            $table->foreign('post_id')->references('id')->on('frontend_posts')->after('id')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists($this->table);
        Schema::enableForeignKeyConstraints();
    }
}
