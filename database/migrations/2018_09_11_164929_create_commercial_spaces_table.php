<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommercialSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commercial_spaces', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id');
            $table->string('space_name');
            $table->text('about_space');
            $table->string('sqm');
            $table->string('cr');
            $table->string('barangay');
            $table->string('street');
            $table->double('latitude');
            $table->double('longitude');
            $table->text('about_area');
            $table->string('owner_name');
            $table->string('email');
            $table->string('mobile_no');
            $table->string('tel_no');
            $table->string('price');
            $table->string('type');
            $table->string('status');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('p_category');
            $table->string('p_type');
            $table->boolean('subscription')->default(true);
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
        Schema::dropIfExists('commercial_spaces');
    }
}
