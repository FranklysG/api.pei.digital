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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workspace_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('specialist_id')->constrained();
            $table->string('uuid')->unique();
            $table->string('title')->nullable();
            $table->string('name')->nullable();
            $table->string('year')->nullable();
            $table->string('class')->nullable();
            $table->string('bout')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            $table->string('diagnostic')->nullable();
            $table->text('description')->nullable();
            $table->string('type')->default('processing');
            $table->string('status')->default('Processando');
            $table->string('date')->default(date('M d, Y'));
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
        Schema::dropIfExists('forms');
    }
};
