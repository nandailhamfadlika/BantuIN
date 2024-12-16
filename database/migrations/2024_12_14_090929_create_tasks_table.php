<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up():void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('task_name');
            $table->text('task_description')->nullable();
            $table->string('task_time_range');
            $table->string('location');
            $table->string('price_range');
            $table->enum('status', ['pending', 'ongoing', 'completed'])->default('pending');
            $table->foreignId('helper_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamp('created_at')->useCurrent(); // Default to current timestamp
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate(); // Default and auto-update
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
