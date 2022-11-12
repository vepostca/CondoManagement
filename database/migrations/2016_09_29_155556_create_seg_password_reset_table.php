<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSegPasswordResetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seg_password_reset', function (Blueprint $table) {
            $table->string('email');
            $table->index('email','idx_seg_password_reset_email');
            $table->string('token');
            $table->index('token','idx_seg_password_reset_token');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('seg_password_reset');
    }
}
