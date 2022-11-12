<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComTelefonoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_telefono', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('com_cliente_id');
            $table->uuid('com_org_id');
            $table->uuid('com_tipo_telefono_id');
            $table->string('codigo_area',6);
            $table->string('num_telf',15);
            $table->boolean('es_principal')->default(false);
            $table->string('notas',255)->default('');
            $table->uuid('telefoneable_id');
            $table->string('telefoneable_type',255);
            $table->index(['telefoneable_id','telefoneable_type'],'idx_com_telefono_telefoneable');

            $table->boolean('activo')->default(false);
            $table->boolean('borrado')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->uuid('created_by')->nullable();
            $table->index('created_by','idx_com_telefono_created_by');
            $table->timestamp('created_at')->nullable();
            $table->string('created_ip',50)->default('0.0.0.0');
            $table->uuid('updated_by')->nullable();
            $table->index('updated_by','idx_com_telefono_updated_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_ip',50)->default('0.0.0.0');

            $table->foreign('com_cliente_id','cf_com_telefono_cliente')->references('id')->on('com_cliente');
            $table->foreign('com_org_id','cf_com_telefono_org')->references('id')->on('com_org');
            $table->foreign('com_tipo_telefono_id','cf_com_telefono_tipo_telefono')->references('id')->on('com_tipo_telefono');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('com_telefono');
    }
}
