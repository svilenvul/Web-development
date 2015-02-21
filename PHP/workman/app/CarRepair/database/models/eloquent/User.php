<?php

namespace CarRepair\Database\Models\Eloquent;

use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Model as Eloquent;
use CarRepair\Database\Models\UserInterface as UI;

class User extends Eloquent implements UserInterface, RemindableInterface, UI {

    use UserTrait,
        RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $primaryKey = 'UserName';
    public $timestamps = false;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

    public function workman() {
        return $this->belongsTo('CarRepair\Database\Models\Eloquent\Workman', 'UserName', 'UserName'); //Profile is your profile model
    }

    public function cars() {
        return $this->hasMany('CarRepair\Database\Models\Eloquent\Car', 'Owner', 'UserName'); //Profile is your profile model      
    }

   
    public function comments() {
        return $this->hasMany('CarRepair\Database\Models\Eloquent\Comment', 'To', 'UserName')->whereNull('About')->orWhere('Comments.From', $this->UserName)->whereNull('About');
            
    }

    public function votes() {
        return $this->hasMany('CarRepair\Database\Models\Eloquent\Vote', 'From', 'UserName');
    }

    //public function __call($method, $parameters) {
    //    parent::__call($method, $parameters);
    //}

    public function assign($input) {
        $this->username = $input['UserName'];
        $this->firstname = $input['FirstName'];
        $this->familyname = $input['FamilyName'];
        $this->email = $input['Email'];
        $this->age = $input['Age'];
        $this->picture = "pictures/profile/default.png";
        $this->sex = $input['Sex'];
        $this->password = Hash::make($input['Password']);
        $this->question = $input['Question'];
        $this->answer = $input['Answer'];
    }

}
