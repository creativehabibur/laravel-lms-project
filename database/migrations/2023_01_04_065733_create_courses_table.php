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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->text('image');
            $table->float('price')->default('0');
            $table->timestamps();
        });

        Schema::create('course_teacher', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('teacher_id');
            $table->timestamps();


            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');

            $table->unique(['course_id','teacher_id']);
        });

        Schema::create('course_student', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('student_id');
            $table->timestamps();


            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');

            $table->unique(['course_id','student_id']);
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
        Schema::dropIfExists('course_teacher');
        Schema::dropIfExists('course_student');
    }
};
