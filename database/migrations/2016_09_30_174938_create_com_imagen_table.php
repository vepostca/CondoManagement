<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComImagenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_imagen', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('com_cliente_id');
            $table->uuid('com_org_id');
            $table->string('nombre_original',150);
            $table->string('titulo',200);
            $table->string('descripcion',255)->default('');
            $table->string('tipo_mime',60);
            $table->unsignedInteger('tamanho');
            $table->unsignedSmallInteger('ancho');
            $table->unsignedSmallInteger('alto');
            $table->string('ruta',255);
            $table->string('archivo',100);
            $table->uuid('imageable_id');
            $table->string('imageable_type',255);
            $table->index(['imageable_id','imageable_type'],'idx_com_imagen_imageable');


            $table->boolean('activo')->default(false);
            $table->boolean('borrado')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->uuid('created_by')->nullable();
            $table->index('created_by','idx_com_imagen_created_by');
            $table->timestamp('created_at')->nullable();
            $table->string('created_ip',50)->default('0.0.0.0');
            $table->uuid('updated_by')->nullable();
            $table->index('updated_by','idx_com_imagen_updated_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_ip',50)->default('0.0.0.0');

            $table->foreign('com_cliente_id','cf_com_imagen_cliente')->references('id')->on('com_cliente');
            $table->foreign('com_org_id','cf_com_imagen_org')->references('id')->on('com_org');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('com_imagen');
    }
}
