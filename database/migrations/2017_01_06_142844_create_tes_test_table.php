<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTesTestTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tes_test', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('title', 20);
            $table->string('email');
            $table->dateTime('post_date');
            $table->integer('words');
            $table->string('attachment');
            $table->string('password');
            $table->string('post_type');
            $table->enum('post_day', ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']);
            $table->string('post_author_gender');
            $table->text('body');
            $table->string('private_post');
            $table->boolean('is_active');
            $table->boolean('is_published');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tes_test');
    }
}
