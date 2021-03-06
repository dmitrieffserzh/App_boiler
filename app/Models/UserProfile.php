<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model {

	protected $table = 'users_profiles';

	protected $fillable = [
		'first_name',
		'last_name',
		'birthday',
		'gender',
		'about',
		'offline_at'
	];

	protected $dates =['offline_at'];


	// RELATIONS
	public function getUser() {
		return $this->belongsTo(User::class);
	}
}
