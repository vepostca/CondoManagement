<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSegPermisoRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seg_permiso_rol', function (Blueprint $table) {
            $table->uuid('id');
            $table->unique('id');
            $table->uuid('com_cliente_id');
            $table->uuid('com_org_id');
            $table->uuid('seg_rol_id');
            $table->uuid('seg_permiso_id');
            $table->primary(['seg_rol_id','seg_permiso_id']);

            $table->boolean('activo')->default(false);
            $table->boolean('borrado')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->uuid('created_by')->nullable();
            $table->index('created_by','idx_seg_permiso_rol_created_by');
            $table->timestamp('created_at')->nullable();
            $table->string('created_ip',50)->default('0.0.0.0');
            $table->uuid('updated_by')->nullable();
            $table->index('updated_by','idx_seg_permiso_rol_updated_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_ip',50)->default('0.0.0.0');

            $table->foreign('seg_rol_id','cf_seg_permiso_rol_rol')
                ->references('id')->on('seg_rol')->onDelete('cascade');
            $table->foreign('seg_permiso_id','cf_seg_permiso_rol_permiso')
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
        Schema::drop('seg_permiso_rol');
    }
}
