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
        Schema::create('goals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')->constrained();
            $table->string('uuid')->unique();
            $table->string('type')->nullable();
            $table->string('goal')->nullable();
            $table->string('period')->nullable();
            $table->string('perfomance')->nullable();
            $table->string('strategy')->nullable();
            $table->string('resource')->nullable();
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
        Schema::dropIfExists('goals');
    }
};
