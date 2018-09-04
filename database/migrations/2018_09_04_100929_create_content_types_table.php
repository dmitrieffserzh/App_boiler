<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTypesTable extends Migration {

    public function up() {
        Schema::create('content_types', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('type');
        });
    }

    public function down() {
        Schema::dropIfExists('content_types');
    }
}