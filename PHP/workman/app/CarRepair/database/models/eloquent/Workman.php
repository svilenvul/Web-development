<?php
namespace CarRepair\Database\Models\Eloquent;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Model as Eloquent;
use CarRepair\Database\Models\WorkmanInterface;

class Workman extends Eloquent implements UserInterface, RemindableInterface, WorkmanInterface {

    use UserTrait,
        RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'workmans';
    protected $primaryKey = 'UserName';
    public $timestamps =false;
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');
    public function user()
    {
        return $this->hasOne('CarRepair\Database\Models\Eloquent\User','UserName','UserName'); //Profile is your profile model
    }
   
    public function comments()
    {
        return $this->hasMany('CarRepair\Database\Models\Eloquent\Comment','From','UserName')->orWhere('Comments.To','UserName'); //Profile is your profile model
       
    }
    
    public function votes() {
        return  $this->hasMany('CarRepair\Database\Models\Eloquent\Vote','To','UserName');
            
    }
}
