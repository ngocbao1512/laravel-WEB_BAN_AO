<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_admins', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->integer('age')->nullable();
            $table->boolean('sex')->nullable();
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
        Schema::dropIfExists('profile_admins');
    }
}
