<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSegOrgRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seg_org_rol', function (Blueprint $table) {
            $table->uuid('id');
            $table->unique('id');
            $table->uuid('com_cliente_id');
            $table->uuid('com_org_id');
            $table->uuid('seg_rol_id');
            $table->primary(['seg_rol_id','com_org_id']);
            $table->boolean('es_solo_lectura')->default(true);

            $table->boolean('activo')->default(false);
            $table->boolean('borrado')->default(false);
            $table->timestamp('deleted_at')->nullable();
            $table->uuid('created_by')->nullable();
            $table->index('created_by','idx_seg_org_rol_created_by');
            $table->timestamp('created_at')->nullable();
            $table->string('created_ip',50)->default('0.0.0.0');
            $table->uuid('updated_by')->nullable();
            $table->index('updated_by','idx_seg_org_rol_updated_by');
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_ip',50)->default('0.0.0.0');

            $table->foreign('com_org_id','cf_seg_org_rol_org')
                ->references('id')->on('com_org')->onDelete('cascade');
            $table->foreign('seg_rol_id','cf_seg_org_rol_rol')
                ->references('id')->on('seg_rol')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('seg_org_rol');
    }
}
