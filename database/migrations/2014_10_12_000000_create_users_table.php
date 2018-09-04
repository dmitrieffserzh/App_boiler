<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('nickname',20)->unique();
	        $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->rememberToken();
	        $table->string('token')->nullable();
	        $table->string('provider', 32)->nullable();
	        $table->string('provider_id')->nullable();
	        $table->string('reg_ip');
	        $table->string('reg_agent');
	        $table->string('role')->default('user');
            $table->timestamps();
	        $table->softDeletes();
        });
    }

    public function down() {
        Schema::dropIfExists('users');
    }
}