<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrontendEventsTable extends Migration
{
    private $table = 'frontend_events';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_published')->default(false);

            //foreign keys
            $table->integer('author_id')->unsigned()->nullable();
            $table->foreign('author_id')->references('id')->on('users')->after('id')->onUpdate('cascade')->onDelete('set null');
            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->after('id')->onUpdate('cascade')->onDelete('set null');
            $table->integer('updated_by')->unsigned()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->after('id')->onUpdate('cascade')->onDelete('set null');
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->after('id')->onUpdate('cascade')->onDelete('set null');

            //dates
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create($this->table. '_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('abstract');
            $table->string('organizer')->nullable();
            $table->string('lector')->nullable();
            $table->string('location')->nullable();
            $table->decimal('price')->nullable();
            $table->text('content');
            $table->string('locale')->index();

            //foreign keys
            $table->integer('event_id')->unsigned();
            $table->unique(['event_id','locale']);
            $table->foreign('event_id')->references('id')->on('frontend_events')->onDelete('cascade');
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
        Schema::dropIfExists($this->table.'_translations');
        Schema::dropIfExists($this->table);
        Schema::enableForeignKeyConstraints();
    }
}
