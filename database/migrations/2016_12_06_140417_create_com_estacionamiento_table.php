<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComEstacionamientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_estacionamiento', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('com_cliente_id');
            $table->uuid('com_org_id');
            $table->uuid('com_inmueble_id');
            $table->string('marca',50)->default('');
            $table->string('modelo',50)->default('');
            $table->string('color',50)->default('');
            $table->string('placas',15)->default('');
            $table->string('observaciones',255)->default('');

            $table->boolean('activo')->default(false);
            $table->boolean('borrado')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->uuid('created_by')->nullable();
            $table->index('created_by','idx_com_estacionamiento_created_by');
            $table->timestamp('created_at')->nullable();
            $table->string('created_ip',50)->default('0.0.0.0');
            $table->uuid('updated_by')->nullable();
            $table->index('updated_by','idx_com_estacionamiento_updated_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_ip',50)->default('0.0.0.0');

            $table->foreign('com_cliente_id','cf_com_estacionamiento_cliente')->references('id')->on('com_cliente');
            $table->foreign('com_org_id','cf_com_estacionamiento_org')->references('id')->on('com_org');
            $table->foreign('com_inmueble_id','cf_com_estacionamiento_inmueble')->references('id')->on('com_inmueble');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('com_estacionamiento');
    }
}
