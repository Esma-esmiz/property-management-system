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
        Schema::create('warranties', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('user_id')->unsigned();
            $table->string("name");
            $table->string('birth_date');
            $table->string('gender');
            $table->string('nationality');
            $table->string('marital_status');
            $table->string('social_id');
            $table->string('social_id_attachment'); //file
            $table->string('email')->unique();
            $table->integer('phone');
            $table->string('region');
            $table->string('city');
            $table->string('sub_city');
            $table->string('woreda');
            $table->string('kebele');
            $table->string('house_number');

            $table->string('hired_date');
            $table->string('employee_type');
            $table->string('employee_id');
            $table->integer('salary');

            $table->string('org_name');
            $table->string('org_location');
            $table->string('email_org')->unique();
            $table->integer('phone_org');

            $table->foreign("user_id")->references("id")->on("users")->onDelete('cascade');
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
        Schema::dropIfExists('warranties');
    }
};
