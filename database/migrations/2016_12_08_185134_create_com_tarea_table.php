<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComTareaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_tarea', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('com_cliente_id');
            $table->uuid('com_org_id');
            $table->string('codigo',10);
            $table->unique(['com_cliente_id','com_org_id','codigo','borrado'],'cu_com_tarea_codigo');
            $table->string('nombre',150);
            $table->string('descripcion',255)->default('');
            $table->date('fecha_inicio');
            $table->date('fecha_culminacion')->nullable();
            $table->decimal('porc_ejecucion',5,2)->default(0);
            $table->uuid('com_estatus_tarea_id');
            $table->enum('visibilidad',['Publica','Privada']);

            $table->boolean('activo')->default(false);
            $table->boolean('borrado')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->uuid('created_by')->nullable();
            $table->index('created_by','idx_com_tarea_created_by');
            $table->timestamp('created_at')->nullable();
            $table->string('created_ip',50)->default('0.0.0.0');
            $table->uuid('updated_by')->nullable();
            $table->index('updated_by','idx_com_tarea_updated_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_ip',50)->default('0.0.0.0');

            $table->foreign('com_cliente_id','cf_com_tarea_cliente')->references('id')->on('com_cliente');
            $table->foreign('com_org_id','cf_com_tarea_org')->references('id')->on('com_org');
            $table->foreign('com_estatus_tarea_id','cf_com_tarea_estatus_tarea')->references('id')->on('com_tarea');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('com_tarea');
    }
}
