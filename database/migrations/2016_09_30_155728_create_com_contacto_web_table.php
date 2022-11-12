<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComContactoWebTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_contacto_web', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('com_cliente_id');
            $table->uuid('com_org_id');
            $table->uuid('com_tipo_contacto_web_id');
            $table->string('valor',150);
            $table->boolean('es_principal')->default(false);
            $table->string('notas',255)->default('');
            $table->uuid('contactable_id');
            $table->string('contactable_type',255);
            $table->index(['contactable_id','contactable_type'],'idx_com_contacto_web_contactable');

            $table->boolean('activo')->default(false);
            $table->boolean('borrado')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->uuid('created_by')->nullable();
            $table->index('created_by','idx_com_contacto_web_created_by');
            $table->timestamp('created_at')->nullable();
            $table->string('created_ip',50)->default('0.0.0.0');
            $table->uuid('updated_by')->nullable();
            $table->index('updated_by','idx_com_contacto_web_updated_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_ip',50)->default('0.0.0.0');

            $table->foreign('com_cliente_id','cf_com_contacto_web_cliente')->references('id')->on('com_cliente');
            $table->foreign('com_org_id','cf_com_contacto_web_org')->references('id')->on('com_org');
            $table->foreign('com_tipo_contacto_web_id','cf_com_contacto_web_tipo_contacto_web')->references('id')->on('com_tipo_contacto_web');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('com_contacto_web');
    }
}
