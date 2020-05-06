<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string("code");
            $table->string("name");
            $table->string('action');
            $table->string('actionTime');
            $table->string('actionBy');
            $table->tinyInteger('is_delete')->default(0);
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')
              ->references('id')->on('departments')
              ->onDelete('cascade');
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
        Schema::dropIfExists('courses');
    }
}
