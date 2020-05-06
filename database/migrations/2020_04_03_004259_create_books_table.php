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
            $table->string('slug')->index();
            $table->text('description', 1000);
            $table->boolean('is_free');
            $table->decimal('price', 12, 2);
            $table->string('author');
            $table->integer('num_of_pages');
            $table->date('published_at');
            $table->string('image');
            $table->boolean('is_electronic');
            $table->string('location')->nullable();
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
