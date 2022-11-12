<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComConceptoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_concepto', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('com_cliente_id');
            $table->uuid('com_org_id');
            $table->string('codigo',10);
            $table->unique(['com_cliente_id','com_org_id','codigo','borrado'],'cu_com_concepto_codigo');
            $table->string('nombre',150);
            $table->uuid('com_categoria_concepto_id');
            $table->string('siglas',20)->default('');
            $table->string('descripcion',255)->default('');
            $table->mediumInteger('orden');

            $table->boolean('activo')->default(false);
            $table->boolean('borrado')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->uuid('created_by')->nullable();
            $table->index('created_by','idx_com_concepto_created_by');
            $table->timestamp('created_at')->nullable();
            $table->string('created_ip',50)->default('0.0.0.0');
            $table->uuid('updated_by')->nullable();
            $table->index('updated_by','idx_com_concepto_updated_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_ip',50)->default('0.0.0.0');

            $table->foreign('com_cliente_id','cf_com_concepto_cliente')
                  ->references('id')->on('com_cliente');
            $table->foreign('com_org_id','cf_com_concepto_org')
                  ->references('id')->on('com_org');
            $table->foreign('com_categoria_concepto_id','cf_com_concepto_categoriaconcepto')
                  ->references('id')->on('com_categoria_concepto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('com_concepto');
    }
}
