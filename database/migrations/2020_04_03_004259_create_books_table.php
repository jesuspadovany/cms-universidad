<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('description');
            $table->boolean('is_free');
            $table->decimal('price', 12, 2);
            $table->string('author');
            $table->integer('num_of_pages');
            $table->datetime('published_at');
            $table->string('image');
            $table->string('location')->nullable();
            $table->boolean('is_available_online');
            $table->string('file')->nullable();
            $table->boolean('in_slider')->default(0);
            $table->integer('position')->default(1);
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
        Schema::dropIfExists('books');
    }
}
