<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSegPermisoUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seg_permiso_usuario', function (Blueprint $table) {
            $table->uuid('id');
            $table->unique('id');
            $table->uuid('com_cliente_id');
            $table->uuid('com_org_id');
            $table->uuid('seg_usuario_id');
            $table->uuid('seg_permiso_id');
            $table->primary('seg_usuario_id','seg_permiso_id');


            $table->boolean('activo')->default(false);
            $table->boolean('borrado')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->uuid('created_by')->nullable();
            $table->index('created_by','idx_seg_permiso_usuario_created_by');
            $table->timestamp('created_at')->nullable();
            $table->string('created_ip',50)->default('0.0.0.0');
            $table->uuid('updated_by')->nullable();
            $table->index('updated_by','idx_seg_permiso_usuario_updated_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_ip',50)->default('0.0.0.0');

            $table->foreign('seg_usuario_id','cf_seg_permiso_usuario_usuario')
                ->references('id')->on('seg_usuario')->onDelete('cascade');
            $table->foreign('seg_permiso_id','cf_seg_permiso_usuario_permiso')
                ->references('id')->on('seg_permiso')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('seg_permiso_usuario');
    }
}
