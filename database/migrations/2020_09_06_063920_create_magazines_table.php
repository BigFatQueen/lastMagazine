<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMagazinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magazines', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->text('photo')->nullable();
            $table->text('postDate')->nullable();
            $table->text('description')->nullable();
            $table->text('article')->nullable();
            $table->string('comment_status')->default('0');
            $table->string('selected_status')->default('0');
            $table->unsignedBigInteger('record_id');
            $table->unsignedBigInteger('announce_id');
            $table->foreign('record_id')
                  ->references('id')
                  ->on('records')
                  ->onDelete('cascade');
            $table->foreign('announce_id')
                  ->references('id')
                  ->on('announces')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('magazines');
    }
}
