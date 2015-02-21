<?php
namespace CarRepair\Database\Models\Eloquent;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Model as Eloquent;
use CarRepair\Database\Models\CommentInterface;

class Comment extends Eloquent implements UserInterface, RemindableInterface, CommentInterface {

    use UserTrait,
        RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';
    protected $primaryKey = 'Id';
    public $timestamps =false;
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');
    
    public function user(){
        return $this->belongsTo('CarRepair\Database\Models\Eloquent\User','From','UserName');
    }
    
    public function answers() {
        return $this->hasMany('CarRepair\Database\Models\Eloquent\Comment','About','Id');        
    }
}
