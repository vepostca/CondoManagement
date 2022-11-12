<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComReservaInstalacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_reserva_instalacion', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('com_cliente_id');
            $table->uuid('com_org_id');
            $table->uuid('com_instalacion_id');
            $table->uuid('com_propietario_id');
            $table->timestamp('fechahora_inicio');
            $table->timestamp('fechahora_fin');
            $table->string('descripcion',255)->default('');
            $table->boolean('acepta_costo')->default(false);
            $table->enum('estatus',['Pendiente','Aprobada','Rechazada','Anulada']);
            $table->timestamp('fecha_estatus')->nullable();
            $table->string('observaciones_estatus',255)->default('');

            $table->boolean('activo')->default(false);
            $table->boolean('borrado')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->uuid('created_by')->nullable();
            $table->index('created_by','idx_com_reservainstalacion_created_by');
            $table->timestamp('created_at')->nullable();
            $table->string('created_ip',50)->default('0.0.0.0');
            $table->uuid('updated_by')->nullable();
            $table->index('updated_by','idx_com_reservainstalacion_updated_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_ip',50)->default('0.0.0.0');

            $table->foreign('com_cliente_id','cf_com_reservainstalacion_cliente')->references('id')->on('com_cliente');
            $table->foreign('com_org_id','cf_com_reservainstalacion_org')->references('id')->on('com_org');
            $table->foreign('com_instalacion_id','cf_com_reservainstalacion_instalacion')->references('id')->on('com_instalacion');
            $table->foreign('com_propietario_id','cf_com_reservainstalacion_propietario')->references('id')->on('com_propietario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('com_reserva_instalacion');
    }
}
