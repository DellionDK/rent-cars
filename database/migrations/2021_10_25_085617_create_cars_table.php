<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('category_id');
            $table->string('brand');
            $table->string('brand_en');
            $table->string('url');
            $table->integer('year');
            $table->boolean('car_with_driver')->default(true);
            $table->boolean('car_without_driver')->default(false);
            $table->integer('passenger_seats');
            $table->integer('length');
            $table->integer('weight');
            $table->integer('width');
            $table->integer('maximum_speed');
            $table->integer('height');
            $table->integer('power');
            $table->integer('trunk');
            $table->integer('engine_volume');
            $table->integer('acceleration_time');
            $table->binary('peculiarities');
            $table->binary('description');
            $table->binary('peculiarities_en');
            $table->binary('description_en');
            $table->string('preview');
            $table->string('video_url')->nullable(true);
            $table->json('gallery')->nullable(true);
            $table->boolean('enabled_video')->default(false);
            $table->integer('price_with_driver');
            $table->integer('car_feed');
            $table->integer('pledge')->nullable(true);
            $table->integer('transfer')->nullable(true);
            $table->json('rate_without_driver');
            $table->binary('seo_description');
            $table->binary('seo_tags');
            $table->binary('seo_title');
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('cars');
    }
}
