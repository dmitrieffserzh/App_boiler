<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model {

	protected $table = 'content';

	// RELATIONS
	public function contentType() {
		return $this->hasOne(ContentType::class, 'type');
	}
}
