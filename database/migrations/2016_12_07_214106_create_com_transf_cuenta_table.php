<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComTransfCuentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_transf_cuenta', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('com_cliente_id');
            $table->uuid('com_org_id');
            $table->uuid('com_cuenta_banco_origen_id');
            $table->uuid('com_cuenta_banco_destino_id');
            $table->decimal('monto',14,2);
            $table->timestamp('fecha');
            $table->string('referencia',30)->default('');
            $table->string('concepto',60)->default('');
            $table->string('notas',255)->default('');

            $table->boolean('activo')->default(false);
            $table->boolean('borrado')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->uuid('created_by')->nullable();
            $table->index('created_by','idx_com_transf_cuenta_created_by');
            $table->timestamp('created_at')->nullable();
            $table->string('created_ip',50)->default('0.0.0.0');
            $table->uuid('updated_by')->nullable();
            $table->index('updated_by','idx_com_transf_cuenta_updated_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_ip',50)->default('0.0.0.0');

            $table->foreign('com_cliente_id','cf_com_transf_cuenta_cliente')->references('id')->on('com_cliente');
            $table->foreign('com_org_id','cf_com_transf_cuenta_org')->references('id')->on('com_org');
            $table->foreign('com_cuenta_banco_origen_id','cf_com_cta_origen_transf')->references('id')->on('com_cuenta_banco');
            $table->foreign('com_cuenta_banco_destino_id','cf_com_cta_destino_transf')->references('id')->on('com_cuenta_banco');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('com_transf_cuenta');
    }
}
