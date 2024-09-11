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

        if( Schema::hasTable('webinar_invites') ) return;

        Schema::create('webinar_invites', function (Blueprint $table) {
            $table->id();
            $table->integer('webinar_id')->unsigned()->nullable();
            $table->integer('student_id')->unsigned()->nullable();
            $table->string('email')->nullable();
            $table->integer('org_id')->unsigned()->nullable();
            $table->integer('status_id')->unsigned()->default(1);
            $table->integer('credits')->default(1);
            $table->timestamps();

            $table->foreign('webinar_id')->on('webinars')->references('id')->cascadeOnDelete();
            $table->foreign('student_id')->on('users')->references('id')->cascadeOnDelete();
            $table->foreign('org_id')->on('users')->references('id')->cascadeOnDelete();
            $table->foreign('status_id')->on('webinar_invite_statuses')->references('id')->cascadeOnDelete();
            $table->unique(['webinar_id', 'student_id', 'org_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('webinar_invites');
    }
};
