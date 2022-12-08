<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone', 30)->unique();
            $table->string('address');
            $table->string('email')->unique();
            $table->string('avatar');
            $table->integer('class_id')->unsigned();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            $table->foreign('class_id')->references('id')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function(Blueprint $table){
            $table->dropForeign('students_class_id_foreign');
        });
        Schema::dropIfExists('students');
    }
};