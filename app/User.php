<?php

namespace App;

use App\Models\UserProfile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    protected $fillable = [
        'nickname',
	    'email',
	    'password',
	    'reg_ip',
	    'reg_agent'
    ];

    protected $hidden = [
        'password',
	    'remember_token',
	    'reg_ip',
	    'reg_agent',
    ];

	// RELATIONS
	public function userProfile() {
		return $this->hasOne(UserProfile::class);
	}
}
