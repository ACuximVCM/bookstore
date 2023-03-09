<?php

use App\Models\Author;
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
            $table->foreignIdFor(Author::class)
                ->constrained()
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->string('name')->nullable(false);
            $table->date('release_date')->nullable(true);
            $table->string('details');
            $table->string('editorial');
            $table->decimal('price', 16, 4);
            $table->string('language');
            $table->tinyInteger('active')->default(1);
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
