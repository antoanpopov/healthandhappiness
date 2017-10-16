<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashboardEditorsTable extends Migration
{

    private $table = 'dashboard_editors';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 128);
            $table->string('email', 128)->nullable();
            $table->string('telephone', 64)->nullable();
            $table->string('mobile', 64)->nullable();
            $table->string('skype', 128)->nullable();
            $table->string('time_zone', 128)->nullable();
            $table->string('rate', 32)->nullable();
            $table->string('min_charge', 32)->nullable();
            $table->decimal('score', 1, 1)->nullable();
            $table->string('experience', 2)->nullable();
            $table->text('notes')->nullable();
            $table->string('color', 32)->nullable();
            $table->enum('role', array('translator', 'editor', 'both'))->nullable();

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

        Schema::create('dashboard_editors_expertise', function (Blueprint $table) {
            $table->integer('editor_id')->unsigned()->index();
            $table->foreign('editor_id')->references('id')->on('dashboard_editors')->onDelete('cascade');

            $table->integer('expertise_id')->unsigned()->index();
            $table->foreign('expertise_id')->references('id')->on('dashboard_expertise')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('dashboard_editors_cat_tools', function (Blueprint $table) {
            $table->integer('editor_id')->unsigned()->index();
            $table->foreign('editor_id')->references('id')->on('dashboard_editors')->onDelete('cascade');

            $table->integer('cat_tool_id')->unsigned()->index();
            $table->foreign('cat_tool_id')->references('id')->on('dashboard_expertise')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('dashboard_editors_source_languages', function (Blueprint $table) {
            $table->integer('editor_id')->unsigned()->index();
            $table->foreign('editor_id')->references('id')->on('dashboard_editors')->onDelete('cascade');

            $table->integer('source_language_id')->unsigned()->index();
            $table->foreign('source_language_id')->references('id')->on('dashboard_languages')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('dashboard_editors_target_languages', function (Blueprint $table) {
            $table->integer('editor_id')->unsigned()->index();
            $table->foreign('editor_id')->references('id')->on('dashboard_editors')->onDelete('cascade');

            $table->integer('target_language_id')->unsigned()->index();
            $table->foreign('target_language_id')->references('id')->on('dashboard_languages')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('dashboard_editors_roles', function (Blueprint $table) {
            $table->integer('editor_id')->unsigned()->index();
            $table->foreign('editor_id')->references('id')->on('dashboard_editors')->onDelete('cascade');

            $table->integer('role_id')->unsigned()->index();
            $table->foreign('role_id')->references('id')->on('dashboard_roles')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::drop('dashboard_editors_expertise');
        Schema::drop('dashboard_editors_cat_tools');
        Schema::drop('dashboard_editors_source_languages');
        Schema::drop('dashboard_editors_target_languages');
        Schema::drop('dashboard_editors_roles');
        Schema::drop($this->table);

        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
