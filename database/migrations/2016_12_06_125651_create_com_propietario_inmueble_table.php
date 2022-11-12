<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComPropietarioInmuebleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_propietario_inmueble', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('com_cliente_id');
            $table->uuid('com_org_id');
            $table->uuid('com_inmueble_id');
            $table->uuid('com_propietario_id');
            $table->uuid('com_tipo_propietario_id');
            $table->string('observaciones',255)->default('');
            $table->boolean('vive_aqui')->default(false);
            $table->boolean('contacto_principal')->default(false);
            $table->boolean('no_aplica_cuota')->default(false);

            $table->boolean('activo')->default(false);
            $table->boolean('borrado')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->uuid('created_by')->nullable();
            $table->index('created_by','idx_com_propietarioinmueble_created_by');
            $table->timestamp('created_at')->nullable();
            $table->string('created_ip',50)->default('0.0.0.0');
            $table->uuid('updated_by')->nullable();
            $table->index('updated_by','idx_com_propietarioinmueble_updated_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_ip',50)->default('0.0.0.0');

            $table->foreign('com_cliente_id','cf_com_propietarioinmueble_cliente')->references('id')->on('com_cliente');
            $table->foreign('com_org_id','cf_com_propietarioinmueble_org')->references('id')->on('com_org');
            $table->foreign('com_inmueble_id','cf_com_propietarioinmueble_inmueble')->references('id')->on('com_inmueble');
            $table->foreign('com_propietario_id','cf_com_propietarioinmueble_propietario')->references('id')->on('com_propietario');
            $table->foreign('com_tipo_propietario_id','cf_com_propietarioinmueble_tipopropietario')->references('id')->on('com_tipo_propietario');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('com_propietario_inmueble');
    }
}
