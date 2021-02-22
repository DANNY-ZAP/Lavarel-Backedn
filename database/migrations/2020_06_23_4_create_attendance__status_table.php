<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceStatusTable extends Migration
{
    public function up()
    {
        Schema::connection('pgsql-attendance')->create('status', function (Blueprint $table) {
            $table->id();
            $table->boolean('text')->default(false); 

        });
    }

    public function down()
    {
        Schema::connection('pgsql-attendance')->dropIfExists('status');
    }
}






