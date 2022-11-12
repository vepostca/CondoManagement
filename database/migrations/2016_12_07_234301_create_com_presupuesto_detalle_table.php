<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComPresupuestoDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_presupuesto_detalle', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('com_cliente_id');
            $table->uuid('com_org_id');
            $table->uuid('com_presupuesto_id');
            $table->uuid('com_concepto_id');
            $table->decimal('mes01',14,2);
            $table->decimal('mes02',14,2);
            $table->decimal('mes03',14,2);
            $table->decimal('mes04',14,2);
            $table->decimal('mes05',14,2);
            $table->decimal('mes06',14,2);
            $table->decimal('mes07',14,2);
            $table->decimal('mes08',14,2);
            $table->decimal('mes09',14,2);
            $table->decimal('mes10',14,2);
            $table->decimal('mes11',14,2);
            $table->decimal('mes12',14,2);
            $table->decimal('total',14,2);
            $table->mediumInteger('orden');

            $table->boolean('activo')->default(false);
            $table->boolean('borrado')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->uuid('created_by')->nullable();
            $table->index('created_by','idx_com_presupuestodet_created_by');
            $table->timestamp('created_at')->nullable();
            $table->string('created_ip',50)->default('0.0.0.0');
            $table->uuid('updated_by')->nullable();
            $table->index('updated_by','idx_com_presupuestodet_updated_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_ip',50)->default('0.0.0.0');

            $table->foreign('com_cliente_id','cf_com_presupuestodet_cliente')
                  ->references('id')->on('com_cliente');
            $table->foreign('com_org_id','cf_com_presupuestodet_org')
                  ->references('id')->on('com_org');
            $table->foreign('com_presupuesto_id','cf_com_presupuestodet_presupuesto')
                ->references('id')->on('com_presupuesto');
            $table->foreign('com_concepto_id','cf_com_presupuestodet_concepto')
                ->references('id')->on('com_concepto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('com_presupuesto_detalle');
    }
}
