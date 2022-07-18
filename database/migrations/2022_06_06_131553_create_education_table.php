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
        Schema::create('education', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('user_id')->unsigned();
            $table->integer('added_by_id')->unsigned();
            $table->string('school_name');
            $table->string('school_location');
            $table->string('edu_department');
            $table->string('edu_academic_level');

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
        Schema::dropIfExists('education');
    }
};
