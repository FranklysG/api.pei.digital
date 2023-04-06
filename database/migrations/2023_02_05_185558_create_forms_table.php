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
            $table->string('school')->nullable();
            // section one
            $table->string('name')->nullable();
            $table->string('year')->nullable();
            $table->string('class')->nullable();
            $table->string('bout')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            // section two
            $table->string('diagnostic')->nullable();
            // section four
            $table->text('description')->nullable();
            // section five
            $table->text('specialist_bool')->nullable();
            // section six
            $table->text('family_description')->nullable();
            // section eight
            $table->text('objective')->nullable();
            // section ten
            $table->text('proposal')->nullable();
            // section eleven
            $table->text('objective_adaptive')->nullable();
            $table->text('action_adaptive')->nullable();
            // section twelve
            $table->text('resources_tech')->nullable();
            // section thirteen
            $table->text('resources_avaliation')->nullable();
            // section fourteen
            $table->text('object')->nullable();
            // section fifteen
            $table->text('conclusion')->nullable();
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
