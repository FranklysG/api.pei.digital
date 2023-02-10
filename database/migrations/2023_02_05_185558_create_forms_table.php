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
            $table->foreignId('workspace_id')->nullable()->constrained();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('uuid')->unique();
            $table->string('name');
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
        Schema::dropIfExists('user_workspaces');
    }
};
