<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComTareaDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_tarea_detalle', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('com_cliente_id');
            $table->uuid('com_org_id');
            $table->uuid('com_tarea_id');
            $table->timestamp('fecha_detalle')->nullable();
            $table->uuid('seg_usuario_id');
            $table->boolean('registra_avance')->default(false);
            $table->decimal('porc_ejecucion',5,2)->default(0);
            $table->boolean('registra_comentario')->default(false);

            $table->boolean('activo')->default(false);
            $table->boolean('borrado')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->uuid('created_by')->nullable();
            $table->index('created_by','idx_com_tareadetalle_created_by');
            $table->timestamp('created_at')->nullable();
            $table->string('created_ip',50)->default('0.0.0.0');
            $table->uuid('updated_by')->nullable();
            $table->index('updated_by','idx_com_tareadetalle_updated_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_ip',50)->default('0.0.0.0');

            $table->foreign('com_cliente_id','cf_com_tareadetalle_cliente')->references('id')->on('com_cliente');
            $table->foreign('com_org_id','cf_com_tareadetalle_org')->references('id')->on('com_org');
            $table->foreign('com_tarea_id','cf_com_tareadetalle_tarea')->references('id')->on('com_tarea');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('com_tarea_detalle');
    }
}
