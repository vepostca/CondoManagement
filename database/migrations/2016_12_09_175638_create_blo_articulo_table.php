<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloArticuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blo_articulo', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('com_cliente_id');
            $table->uuid('com_org_id');
            $table->uuid('seg_usuario_id');
            $table->uuid('blo_categoria_id');
            $table->string('titulo',255);
            $table->string('slug')->nullable();
            $table->longText('contenido');

            $table->boolean('activo')->default(false);
            $table->boolean('borrado')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->uuid('created_by')->nullable();
            $table->index('created_by','idx_blo_articulo_created_by');
            $table->timestamp('created_at')->nullable();
            $table->string('created_ip',50)->default('0.0.0.0');
            $table->uuid('updated_by')->nullable();
            $table->index('updated_by','idx_blo_articulo_updated_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_ip',50)->default('0.0.0.0');

            $table->foreign('com_cliente_id','cf_blo_articulo_cliente')
                ->references('id')->on('com_cliente');
            $table->foreign('com_org_id','cf_blo_articulo_org')
                ->references('id')->on('com_org');
            $table->foreign('blo_categoria_id','cf_blo_articulo_categoria')
                ->references('id')->on('blo_categoria');
            $table->foreign('seg_usuario_id','cf_blo_articulo_usuario')
                ->references('id')->on('seg_usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('blo_articulo');
    }
}
