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
        Schema::create('users', function (Blueprint $table) {
            $table->increments("id");

            //general
            $table->string('hired_date');
            $table->string('employee_type');
            $table->string('employee_id');
            $table->integer('campus_id')->unsigned();

            //personal detail
            $table->string("surname");
            $table->string("title");
            $table->string('name');
            $table->string('birth_date');
            $table->string('gender');
            $table->string('nationality');
            $table->string('marital_status');
            $table->integer('bank_account');
            $table->string('social_id');
            $table->binary('social_id_attachment'); //file
            $table->binary('photo')->nullable();

            $table->string('academic_status');
            $table->string('clearance_status');

            //address
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('phone');
            $table->string('region');
            $table->string('city');
            $table->string('sub_city');
            $table->string('woreda');
            $table->string('kebele');
            $table->string('house_number');

            //salary structure
           

            //emergency contact
            $table->integer('added_by_id')->unsigned();
          
            //work experiences
           
            //education detail
     
            //other
            $table->string('other_info');

            //other 
            $table->string("username");
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign("added_by_id")->references("id")->on("users")->onDelete('cascade');
            $table->foreign("campus_id")->references("id")->on("campuses")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
