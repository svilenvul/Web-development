<?php
namespace CarRepair\Database\Models\Eloquent;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Model as Eloquent;
use CarRepair\Database\Models\VoteInterface;

class Vote extends Eloquent implements UserInterface,RemindableInterface,  VoteInterface {
    use UserTrait,
        RemindableTrait;
    
    protected $table = 'votes';
    public $timestamps = false;
    
    public function from() {
        return $this->belongsTo('CarRepair\Database\Models\Eloquent\User','From','UserName');
    }
    
    public function to() {
        return $this->belongsTo('CarRepair\Database\Models\Eloquent\Workman','To','UserName');
    }
}
        

