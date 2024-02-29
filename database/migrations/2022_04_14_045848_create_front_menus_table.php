<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('front_menus', function (Blueprint $table) {
            $table->id();
            $table->string('menu_parent')->nullable();
            $table->string('menu_name');
            $table->string('menu_url')->nullable();
            $table->longText('content')->nullable();
<<<<<<< HEAD
            $table->string('type')->nullable();
=======
            $table->boolean('active')->default(true);
            $table->boolean('link')->default(false);
>>>>>>> 57cd9d6f8615469020dc8a6e5e8bddd03a11010e
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
        Schema::dropIfExists('front_menus');
    }
}
