<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoordinatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordinators', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
             $table->unsignedBigInteger('faculty_id');
            // $table->text('photo')->nullable();
            $table->text('nrc')->nullable();
            $table->string('education')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
           
            $table->foreign('faculty_id')
                  ->references('id')
                  ->on('faculties');
            $table->softDeletes();
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
        Schema::dropIfExists('coordinators');
    }
}
