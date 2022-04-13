<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sqlite_lpc')->create('questions', function (Blueprint $table) {
            $table->id();
            $table->integer('type_id');
            $table->integer('category_id');
            $table->integer('difficulty');
            $table->float('score');
            $table->text('question');
            $table->json('meta')->nullable();
            $table->text('answer')->nullable();
            $table->text('analysis')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('sqlite_lpc')->dropIfExists('questions');
    }
}
