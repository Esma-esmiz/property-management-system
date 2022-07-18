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
        Schema::create('emergencies', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('user_id')->unsigned();
            $table->integer('added_by_id')->unsigned();
            $table->string('em_name');
            $table->string('em_relation');
            $table->integer('em_phone');
            $table->string('em_email');
            $table->string('em_city');
            $table->string('em_sub_city');
            $table->string('em_woreda');
            $table->string('em_kebele');
            $table->string('em_house_number');
            $table->foreign("user_id")->references("id")->on("users")->onDelete('cascade');
            $table->foreign("added_by_id")->references("id")->on("users")->onDelete('cascade');
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
        Schema::dropIfExists('emergencies');
    }
};
