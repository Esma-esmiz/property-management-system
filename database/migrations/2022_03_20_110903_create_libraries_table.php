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
        Schema::create('libraries', function (Blueprint $table) {
            $table->increments('id');
            $table->String("name");
            $table->string("phone_mobile");
            $table->String("phone_fixed");
            $table->String("Email")->unique();
            $table->String("address_line1");
            $table->String("address_line2");
            $table->String("country");
            $table->String("city");
            $table->String("state");
            $table->String("postal_code");
            $table->String("fax");
            $table->Integer("map_id")->unsigned();
            $table->String("url");
            $table->integer("campus_id")->unsigned();
            $table->timestamps();
            $table->foreign("campus_id")->references("id")->on("campuses")->onDelete("cascade");
           // $table->primary(["map_id","campus_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libraries');
    }
};
