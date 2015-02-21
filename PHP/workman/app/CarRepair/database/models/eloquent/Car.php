<?php
namespace CarRepair\Database\Models\Eloquent;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Model as Eloquent;
use CarRepair\Database\Models\CarInterface;

class Car extends Eloquent implements UserInterface, RemindableInterface,  CarInterface {

    use UserTrait,
        RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cars';
    protected $primaryKey = 'Id';
    public $timestamps =false;
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');
    public function user()
    {
        return $this->hasOne('CarRepair\Database\Models\Eloquent\User','Owner','UserName'); //Profile is your profile model
    }
    
}

