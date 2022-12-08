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
        Schema::create('marks', function (Blueprint $table) {
            $table->integer('student_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->float('mark');
            $table->primary('student_id');
            $table->primary('subject_id');
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('subject_id')->references('id')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('marks', function (Blueprint $table) {
            $table->dropForeign('marks_student_id_foreign');
            $table->dropForeign('marks_subject_id_foreign');
        });
        Schema::dropIfExists('marks');
    }
};