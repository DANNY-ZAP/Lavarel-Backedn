<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancePermisosTable extends Migration
{
    public function up()
    {
        Schema::connection('pgsql-attendance')->create('permisos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('motive_id')->constrained('attendance.motivos');
            $table->foreignId('employer_id')->constrained('attendance.empleador');
            $table->date('date_from')->comment('Fecha desde cuando se pide el permiso');
            $table->date('date_until')->comment('Fecha hasta cuando se pide el permiso');
            $table->text('form_code')->comment('codigo asignado por la senescyt para el formulario');
            $table->text('register')->comment('quien registra');
            $table->timestamp('time_from')->comment('hora desde que se pide el permiso');
            $table->timestamp('time_until')->comment('hora hasta la que se pide el permiso');
            $table->integer('total_of_days')->comment('total de días solicitados');
            $table->decimal('total_of_hours')->comment('total de horas solicitados');
            $table->foreignId('user_id')->constrained('authentication.users');
            $table->date('survey_date')->cmment('fecha de cabecera del formulario');

        });
    }

    public function down()
    {
        Schema::connection('pgsql-attendance')->dropIfExists('permisos');
    }
}






