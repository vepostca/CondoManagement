<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComOrgInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_org_info', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('com_cliente_id');
            $table->uuid('com_moneda_id');
            $table->uuid('com_tipo_calculo_cuota_id');
            $table->char('separador_decimal',1)->default(',');
            $table->tinyInteger('num_dec_coeficiente')->default(4);

            $table->boolean('activo')->default(false);
            $table->boolean('borrado')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->uuid('created_by')->nullable();
            $table->index('created_by','idx_com_orginfo_created_by');
            $table->timestamp('created_at')->nullable();
            $table->string('created_ip',50)->default('0.0.0.0');
            $table->uuid('updated_by')->nullable();
            $table->index('updated_by','idx_com_orginfo_updated_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_ip',50)->default('0.0.0.0');

            $table->foreign('id','cf_com_org_info_org')->references('id')->on('com_org');
            $table->foreign('com_moneda_id','cf_com_org_info_moneda')->references('id')->on('com_moneda');
            $table->foreign('com_tipo_calculo_cuota_id','cf_com_org_info_calculo_cuota')
                ->references('id')->on('com_tipo_calculo_cuota');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('com_org_info');
    }
}
