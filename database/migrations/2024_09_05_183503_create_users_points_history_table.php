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
        if (!Schema::hasTable('users_points_history')) {
            Schema::create('users_points_history', function (Blueprint $table) {
                $table->id();
                $table->integer('user_id')->unsigned()->nullable();
                $table->integer('amount')->unsigned();
                $table->string('action');
                $table->string('description')->nullable();
                $table->unsignedBigInteger('sent_to')->nullable();
                $table->unsignedBigInteger('received_from')->nullable();
                $table->unsignedBigInteger('course_id')->nullable();
                $table->timestamps();

                $table->foreign('user_id')->on('users')->references('id')->cascadeOnDelete();

            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_points_history');
    }
};
