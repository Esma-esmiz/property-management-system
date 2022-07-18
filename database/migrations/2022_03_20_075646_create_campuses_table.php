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
        Schema::create('campuses', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
            $table->date("open_year");
            $table->string("country");
            $table->string("Region");
            $table->string("city");
            $table->string("phone_mobile");
            $table->string("phone_fixed");
            $table->string("Email");
            $table->string("StreetAddress");
            $table->string("status");
            $table->timestamps();
           // $table->primary(['map_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campuses');
    }
};
