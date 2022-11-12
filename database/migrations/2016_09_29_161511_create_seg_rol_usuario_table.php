<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSegRolUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seg_rol_usuario', function (Blueprint $table) {
            $table->uuid('id');
            $table->unique('id');
            $table->uuid('com_cliente_id');
            $table->uuid('com_org_id');
            $table->uuid('seg_usuario_id');
            $table->uuid('seg_rol_id');
            $table->primary(['seg_usuario_id','seg_rol_id']);


            $table->boolean('activo')->default(false);
            $table->boolean('borrado')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->uuid('created_by')->nullable();
            $table->index('created_by','idx_seg_rol_usuario_created_by');
            $table->timestamp('created_at')->nullable();
            $table->string('created_ip',50)->default('0.0.0.0');
            $table->uuid('updated_by')->nullable();
            $table->index('updated_by','idx_seg_rol_usuario_updated_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_ip',50)->default('0.0.0.0');

            $table->foreign('com_cliente_id','cf_seg_rol_usuario_cliente')
                ->references('id')->on('com_cliente');
            $table->foreign('com_org_id','cf_seg_rol_usuario_org')
                ->references('id')->on('com_org');
            $table->foreign('seg_rol_id','cf_seg_rol_usuario_rol')
                ->references('id')->on('seg_rol')->onDelete('cascade');
            $table->foreign('seg_usuario_id','cf_seg_rol_usuario_usuario')
                ->references('id')->on('seg_usuario')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('seg_rol_usuario');
    }
}
