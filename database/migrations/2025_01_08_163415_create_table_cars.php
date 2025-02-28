<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_cars', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model');
            $table->string('category');
            $table->year('year');
            $table->float('0-100km/h', 5, 2);
            $table->float('0-160km/h', 5, 2);
            $table->float('1/4mile', 5, 2);
            $table->integer('top_speed');
            $table->string('engine');
            $table->integer('horsepower');
            $table->integer('torque');
            $table->integer('weight');
            $table->integer('seating');
            $table->string('drive');
            $table->string('transmission');
            $table->decimal('price', 10, 2);
            $table->text('performance');
            $table->text('interior');
            $table->string('main_image');
            $table->string('second_image');
            $table->string('performance_image');
            $table->string('interior_image');
            $table->string('video');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_cars');
    }
};
