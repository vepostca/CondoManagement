<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloEtiquetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blo_etiqueta', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('com_cliente_id');
            $table->uuid('com_org_id');
            $table->string('nombre',150);
            $table->unique(['com_cliente_id','com_org_id','nombre','borrado'],'cu_blo_etiqueta_nombre');

            $table->boolean('activo')->default(false);
            $table->boolean('borrado')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->uuid('created_by')->nullable();
            $table->index('created_by','idx_blo_etiqueta_created_by');
            $table->timestamp('created_at')->nullable();
            $table->string('created_ip',50)->default('0.0.0.0');
            $table->uuid('updated_by')->nullable();
            $table->index('updated_by','idx_blo_etiqueta_updated_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_ip',50)->default('0.0.0.0');

            $table->foreign('com_cliente_id','cf_blo_etiqueta_cliente')->references('id')->on('com_cliente');
            $table->foreign('com_org_id','cf_blo_etiqueta_org')->references('id')->on('com_org');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('blo_etiqueta');
    }
}
