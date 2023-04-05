<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->default('soulofjava');
            $table->string('path')->default('img/soulofjava.jpg');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->date('date');
            $table->string('upload_by');
            $table->text('description', 4294967295);
            $table->bigInteger('attachment')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('news');
    }
}
