<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetaTagsTable extends Migration {

    public function up() {
        Schema::create('meta_tags', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('controller')->nullable();
	        $table->string('action')->nullable();
	        $table->string('title');
	        $table->string('description');
	        $table->string('keywords');
	        $table->integer('content_id')->unsigned()->nullable();
        });
    }

    public function down() {
        Schema::dropIfExists('meta_tags');
    }
}
