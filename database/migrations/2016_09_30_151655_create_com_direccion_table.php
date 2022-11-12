<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComDireccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_direccion', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('com_cliente_id');
            $table->uuid('com_org_id');
            $table->uuid('com_tipo_direccion_id');
            $table->string('ciudad',100);
            $table->string('linea_dir',255);
            $table->string('apartado_postal',10)->default('');
            $table->uuid('com_pais_id');
            $table->uuid('com_region_id')->nullable();
            $table->boolean('es_principal')->default(false);
            $table->decimal('latitud',12,9)->nullable();
            $table->decimal('longitud',12,9)->nullable();
            $table->uuid('direccionable_id');
            $table->string('direccionable_type',255);
            $table->index(['direccionable_id','direccionable_type'],'idx_com_direccion_direccionable');

            $table->boolean('activo')->default(false);
            $table->boolean('borrado')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->uuid('created_by')->nullable();
            $table->index('created_by','idx_com_direccion_created_by');
            $table->timestamp('created_at')->nullable();
            $table->string('created_ip',50)->default('0.0.0.0');
            $table->uuid('updated_by')->nullable();
            $table->index('updated_by','idx_com_direccion_updated_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_ip',50)->default('0.0.0.0');

            $table->foreign('com_cliente_id','cf_com_direccion_cliente')->references('id')->on('com_cliente');
            $table->foreign('com_org_id','cf_com_direccion_org')->references('id')->on('com_org');
            $table->foreign('com_tipo_direccion_id','cf_com_direccion_tipo_direccion')->references('id')->on('com_tipo_direccion');
            $table->foreign('com_pais_id','cf_com_direccion_pais')->references('id')->on('com_pais');
            $table->foreign('com_region_id','cf_com_direccion_region')->references('id')->on('com_region');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('com_direccion');
    }
}
