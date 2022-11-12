<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_proveedor', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('com_cliente_id');
            $table->uuid('com_org_id');
            $table->string('codigo',10);
            $table->unique(['com_cliente_id','com_org_id','codigo','borrado'],'cu_pro_proveedor_codigo');
            $table->string('nombre',100);
            $table->string('id_legal',20)->default('');
            $table->string('siglas',20)->default('');
            $table->string('observaciones',255)->default('');
            $table->uuid('pro_actividad_proveedor_id');

            $table->boolean('activo')->default(false);
            $table->boolean('borrado')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->uuid('created_by')->nullable();
            $table->index('created_by','idx_com_proveedor_created_by');
            $table->timestamp('created_at')->nullable();
            $table->string('created_ip',50)->default('0.0.0.0');
            $table->uuid('updated_by')->nullable();
            $table->index('updated_by','idx_com_proveedor_updated_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_ip',50)->default('0.0.0.0');

            $table->foreign('com_cliente_id','cf_pro_proveedor_cliente')->references('id')->on('com_cliente');
            $table->foreign('com_org_id','cf_pro_proveedor_org')->references('id')->on('com_org');
            $table->foreign('pro_actividad_proveedor_id','cf_pro_proveedor_actividadproveedor')->references('id')->on('pro_actividad_proveedor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pro_proveedor');
    }
}
