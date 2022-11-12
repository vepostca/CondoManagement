<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComCuentaBancoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_cuenta_banco', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('com_cliente_id');
            $table->uuid('com_org_id');
            $table->string('codigo',10);
            $table->unique(['com_cliente_id','com_org_id','codigo','borrado'],'cu_com_cuentabanco_codigo');
            $table->string('nombre',60);
            $table->uuid('com_tipo_cuenta_banco_id');
            $table->uuid('com_entidad_bancaria_id')->nullable();
            $table->string('num_cuenta',30)->default('');
            $table->decimal('saldo_inicial',14,2);
            $table->date('fecha_saldo_inicial')->nullable();
            $table->decimal('saldo_actual',14,2);
            $table->date('fecha_saldo_actual')->nullable();
            $table->string('observaciones',255)->default('');


            $table->boolean('activo')->default(false);
            $table->boolean('borrado')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->uuid('created_by')->nullable();
            $table->index('created_by','idx_com_cuentabanco_created_by');
            $table->timestamp('created_at')->nullable();
            $table->string('created_ip',50)->default('0.0.0.0');
            $table->uuid('updated_by')->nullable();
            $table->index('updated_by','idx_com_cuentabanco_updated_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_ip',50)->default('0.0.0.0');

            $table->foreign('com_cliente_id','cf_com_cuentabanco_cliente')->references('id')->on('com_cliente');
            $table->foreign('com_org_id','cf_com_cuentabanco_org')->references('id')->on('com_org');
            $table->foreign('com_tipo_cuenta_banco_id','cf_com_cuentabanco_tipocta')->references('id')->on('com_tipo_cuenta_banco');
            $table->foreign('com_entidad_bancaria_id','cf_com_cuentabanco_entidadbancaria')->references('id')->on('com_entidad_bancaria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('com_cuenta_banco');
    }
}
