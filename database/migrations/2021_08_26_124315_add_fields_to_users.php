<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('image')->nullable();
            $table->string('sex')->nullable();
            $table->string('matric_no')->nullable();
            // $table->string('status')->nullable();
            $table->string('faculty')->nullable();
            $table->string('department')->nullable();
            $table->string('programme')->nullable();
            $table->string('level')->nullable();
            $table->string('year_admit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            Schema::dropIfExists('image');
            Schema::dropIfExists('sex');
            Schema::dropIfExists('matric_no');
            Schema::dropIfExists('faculty');
            Schema::dropIfExists('department');
            Schema::dropIfExists('programme');
            Schema::dropIfExists('level');
            Schema::dropIfExists('year_admit');
        });
    }
}
