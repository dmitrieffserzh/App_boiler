<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration {

    public function up() {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
	        $table->integer('user_id')->unsigned()->references('id')->on('users');
	        $table->string('title');
	        $table->longText('content');
	        $table->string('slug');
	        $table->integer('category_id')->unsigned()->nullable();
	        $table->integer('published')->default(1);
	        $table->integer('spam')->default(0);
	        $table->integer('count_view')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('news');
    }
}
