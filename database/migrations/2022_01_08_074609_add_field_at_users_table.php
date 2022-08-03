<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldAtUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('profile_photo')->default('default_profile_photo.jpg');
            $table->string('cover_photo')->default('default_cover_photo.jpg');
            $table->text('short_description')->nullable();
            $table->string('availability')->nullable();
            $table->integer('age')->nullable();
            $table->string('year_experience')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone_number','profile_photo','cover_photo','short_description','availability','age','year_experience']);
        });
    }
}
