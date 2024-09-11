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
        Schema::create('organization_students', function (Blueprint $table) {
            $table->id();
            $table->integer('organization_id')->unsigned()->nullable();
            $table->integer('student_id')->unsigned()->nullable();
            $table->integer('confirmed')->unsigned()->default(0);
            $table->timestamps();

            $table->foreign('organization_id')->on('users')->references('id')->cascadeOnDelete();
            $table->foreign('student_id')->on('users')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organization_students');
    }
};
