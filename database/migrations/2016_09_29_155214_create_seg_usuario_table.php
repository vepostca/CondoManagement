<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSegUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seg_usuario', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('com_cliente_id');
            $table->uuid('com_org_id');
            $table->string('nombres',60);
            $table->string('apellidos',60);
            $table->string('username',60);
            $table->unique(['username','borrado'],'cu_seg_usuario_username');
            $table->string('email',150);
            $table->unique(['email','borrado'],'cu_seg_usuario_email');
            $table->string('password',200);
            $table->rememberToken();

            $table->boolean('activo')->default(false);
            $table->boolean('borrado')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->uuid('created_by')->nullable();
            $table->index('created_by','idx_seg_usuario_created_by');
            $table->timestamp('created_at')->nullable();
            $table->string('created_ip',50)->default('0.0.0.0');
            $table->uuid('updated_by')->nullable();
            $table->index('updated_by','idx_seg_usuario_updated_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_ip',50)->default('0.0.0.0');

            $table->foreign('com_cliente_id','cf_seg_usuario_cliente')
                ->references('id')->on('com_cliente');
            $table->foreign('com_org_id','cf_seg_usuario_org')
                ->references('id')->on('com_org');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('seg_usuario');
    }
}
