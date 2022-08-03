<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_areas', function (Blueprint $table) {
            $table->id();
            $table->string('text',15);
            $table->string('headline');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('address');
            $table->text('short_description');
            $table->string('photo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_areas');
    }
}
