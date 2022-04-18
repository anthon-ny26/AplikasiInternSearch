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
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->integer('rating');
            $table->integer('like');
            $table->longText('comment');
            $table->unsignedInteger('company_id');
            $table->timestamps();
            $table->foreign('user_id', 'fk_user_id')->references('id')->on('users');
            $table->foreign('company_id', 'fk_company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
