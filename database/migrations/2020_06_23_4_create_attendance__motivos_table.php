<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceMotivosTable extends Migration
{
    public function up()
    {
        Schema::connection('pgsql-attendance')->create('motivos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleador_id')->constrained('ignug.institutions');
            $table->text('reason')->comment('Motivo del permiso Ej:  licencia por maternidad');
            $table->boolean('discount')->default(false)->comment('saber si se descuenta o no de las vacaciones');
            $table->boolean('observations_obligatorie')->default(false)->comment('obligatoriedad de la observacion');
            $table->integer('days')->comment('total de dias');
            $table->integer('hours')->comment('total de horas');
            $table->boolean('obligatorie_time')->default(false)->comment('determinar si se cummple o no con el tiempo permititpo por determinado permiso');
            $table->text('description')->comment('descripcion del permiso');
            $table->text('time_description')->comment('descripcion del tiempo de permiso solicitado');
        });
    }

    public function down()
    {
        Schema::connection('pgsql-attendance')->dropIfExists('motivos');
    }
}






