<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComInmuebleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_inmueble', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('com_cliente_id');
            $table->uuid('com_org_id');
            $table->uuid('com_division_id');
            $table->string('codigo',10);
            $table->unique(['com_org_id','com_division_id','codigo','borrado'],'cu_com_inmueble_codigo');
            $table->string('nombre',100);
            $table->uuid('com_tipo_inmueble_id');
            $table->decimal('coeficiente',12,8);
            $table->decimal('area',12,4);

            $table->boolean('activo')->default(false);
            $table->boolean('borrado')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->uuid('created_by')->nullable();
            $table->index('created_by','idx_com_inmueble_created_by');
            $table->timestamp('created_at')->nullable();
            $table->string('created_ip',50)->default('0.0.0.0');
            $table->uuid('updated_by')->nullable();
            $table->index('updated_by','idx_com_inmueble_updated_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_ip',50)->default('0.0.0.0');

            $table->foreign('com_cliente_id','cf_com_inmueble_cliente')->references('id')->on('com_cliente');
            $table->foreign('com_org_id','cf_com_inmueble_org')->references('id')->on('com_org');
            $table->foreign('com_division_id','cf_com_inmueble_division')->references('id')->on('com_division');
            $table->foreign('com_tipo_inmueble_id','cf_com_inmueble_tipo_inmueble')->references('id')->on('com_tipo_inmueble');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('com_inmueble');
    }
}
