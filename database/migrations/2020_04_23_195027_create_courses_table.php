<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('slug')->index();
            $table->string('descripcion');
            $table->decimal('precio', 8, 2);
            $table->string('imagen');
            $table->string('ubicacion');
            $table->string('material')->nullable();
            $table->string('horarios');
            $table->string('profesor');
            $table->string('anfitrion');
            $table->string('tipo');
            $table->string('duracion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
