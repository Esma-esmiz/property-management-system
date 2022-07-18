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
        Schema::create('salaries', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('user_id')->unsigned();
            $table->integer('added_by_id')->unsigned();
            $table->integer('basic_salary');
            $table->integer('phone_allowance');
            $table->integer('gasoline_allowance');
            $table->integer('insurance_allowance');
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
        Schema::dropIfExists('salaries');
    }
};
