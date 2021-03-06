<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

    public function up() {
        Schema::create('categories', function (Blueprint $table) {
	        $table->increments('id');
	        $table->integer('parent_id')->unsigned()->default(0);
	        $table->string('title');
	        $table->text('description')->nullable();
	        $table->string('slug')->unique();
	        $table->string('color')->default('#007bff');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('categories');
    }
}
