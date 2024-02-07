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
            $table->text('title', 4294967295)->nullable();
            $table->text('slug', 4294967295)->nullable();
            $table->date('date')->nullable();
            $table->integer('upload_by')->default(2);
            $table->longText('content', 4294967295)->nullable();
            $table->string('attachment')->nullable();
            $table->boolean('highlight')->default(false);
            $table->string('kategori')->default('INFORMASI_ST_02');
            $table->boolean('dip')->default(false);
            $table->string('dip_tahun')->nullable();
            $table->boolean('komentar')->default(false);
            $table->boolean('terbit')->default(false);
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
