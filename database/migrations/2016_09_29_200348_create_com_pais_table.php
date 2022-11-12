<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComPaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_pais', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('com_cliente_id');
            $table->uuid('com_org_id');
            $table->string('codigo_iso2',10);
            $table->unique(['codigo_iso2','borrado'],'cu_com_pais_codigo_iso2');
            $table->string('codigo_iso3',10);
            $table->unique(['codigo_iso3','borrado'],'cu_com_pais_codigo_iso3');
            $table->string('nombre',100);
            $table->string('descripcion',255);
            $table->string('codigo_telefonico', 6);
            $table->boolean('tiene_region')->default(false);
            $table->string('nombre_region',100)->default('');
            $table->decimal('latitud',12,9)->default(0);
            $table->decimal('longitud',12,9)->default(0);

            $table->boolean('activo')->default(false);
            $table->boolean('borrado')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->uuid('created_by')->nullable();
            $table->index('created_by','idx_com_pais_created_by');
            $table->timestamp('created_at')->nullable();
            $table->string('created_ip',50)->default('0.0.0.0');
            $table->uuid('updated_by')->nullable();
            $table->index('updated_by','idx_com_pais_updated_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_ip',50)->default('0.0.0.0');

            $table->foreign('com_cliente_id','cf_com_pais_cliente')->references('id')->on('com_cliente');
            $table->foreign('com_org_id','cf_com_pais_org')->references('id')->on('com_org');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('com_pais');
    }
}
