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
        Schema::create('experiences', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('user_id')->unsigned();
            $table->integer('added_by_id')->unsigned();
            $table->string('company_name');
            $table->string('company_location');
            $table->string('ex_division');
            $table->string('ex_department');
            $table->string('ex_title');
            $table->string('ex_start_date'); ///experince 
            $table->string('ex_end_date');
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
        Schema::dropIfExists('experiences');
    }
};
