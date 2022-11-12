<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSegRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seg_rol', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('com_cliente_id');
            $table->uuid('com_org_id');
            $table->string('nombre',60);
            $table->string('slug',255);
            $table->unique(['slug','borrado'],'cu_seg_rol_slug');
            $table->string('descripcion',255)->default('');
            $table->smallInteger('nivel_jerarquia')->default(1);
            $table->char('nivel_acceso',3)->default('S--');

            $table->boolean('activo')->default(false);
            $table->boolean('borrado')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->uuid('created_by')->nullable();
            $table->index('created_by','idx_seg_rol_created_by');
            $table->timestamp('created_at')->nullable();
            $table->string('created_ip',50)->default('0.0.0.0');
            $table->uuid('updated_by')->nullable();
            $table->index('updated_by','idx_seg_rol_updated_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_ip',50)->default('0.0.0.0');

            $table->foreign('com_cliente_id','cf_seg_rol_cliente')->references('id')->on('com_cliente');
            $table->foreign('com_org_id','cf_seg_rol_org')->references('id')->on('com_org');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('seg_rol');
    }
}
