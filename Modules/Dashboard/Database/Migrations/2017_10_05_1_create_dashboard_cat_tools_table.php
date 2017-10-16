<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashboardCatToolsTable extends Migration
{
    private $table = 'dashboard_cat_tools';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            //foreign keys
            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->after('id')->onUpdate('cascade')->onDelete('set null');
            $table->integer('updated_by')->unsigned()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->after('id')->onUpdate('cascade')->onDelete('set null');
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->after('id')->onUpdate('cascade')->onDelete('set null');

            //dates
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->dropForeign(sprintf('%s_%s_foreign',$this->table,'created_by'));
            $table->dropForeign(sprintf('%s_%s_foreign',$this->table,'updated_by'));
            $table->dropForeign(sprintf('%s_%s_foreign',$this->table,'deleted_by'));

        });

        Schema::drop($this->table);
    }
}
