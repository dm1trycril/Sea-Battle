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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('first_user_id')->nullable()->constrained('users');
            $table->foreignId('second_user_id')->nullable()->constrained('users');
            $table->foreignId('first_user_gamefield_id')->nullable()->constrained('gamefields');
            $table->foreignId('second_user_gamefield_id')->nullable()->constrained('gamefields');
            $table->unsignedInteger('turn');
            $table->foreignId('status_name')->constrained('gamestatuses');
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
        Schema::dropIfExists('rooms');
    }
};
