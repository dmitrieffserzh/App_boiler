<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentType extends Model {

	// RELATIONS
	public function content() {
		return $this->hasMany(Content::class, 'content_type');
	}
}
