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
        if (Schema::hasTable('certificate_template_translations')) {
            if (Schema::hasTable('certificate_template_translations')) {
                if (!Schema::hasColumn('certificate_template_translations', 'elements')) {
                    Schema::table('certificate_template_translations', function (Blueprint $table) {
                        $table->longText('elements')->nullable();
                    });
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
