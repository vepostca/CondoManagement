<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComOrgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_org', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('com_cliente_id');
            $table->string('codigo',10);
            $table->unique(['com_cliente_id','codigo','borrado'],'cu_com_org_codigo');
            $table->string('nombre',100);
            $table->unique(['com_cliente_id','nombre','borrado'],'cu_com_org_nombre');
            $table->string('id_legal',20)->default('');
            $table->string('descripcion',255)->default('');
            $table->timestamp('fecha_alta')->nullable();
            $table->timestamp('fecha_baja')->nullable();


            $table->string('servidor_smtp',100)->default('');
            $table->string('cuenta_smtp',100)->default('');
            $table->string('pwd_smtp',50)->default('');
            $table->string('seguridad_smtp',10)->default('');
            $table->string('puerto_smtp',5)->default('');

            $table->boolean('activo')->default(false);
            $table->boolean('borrado')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->uuid('created_by')->nullable();
            $table->index('created_by','idx_com_org_created_by');
            $table->timestamp('created_at')->nullable();
            $table->string('created_ip',50)->default('0.0.0.0');
            $table->uuid('updated_by')->nullable();
            $table->index('updated_by','idx_com_org_updated_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_ip',50)->default('0.0.0.0');

            $table->foreign('com_cliente_id','cf_com_org_cliente')->references('id')->on('com_cliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('com_org');
    }
}
