<?php
namespace CarRepair\Database\Reprisotories\Eloquent;

use Illuminate\Support\Facades\Hash;
use CarRepair\Database\Models\WorkmanInterface as WI;
use CarRepair\Database\Reprisotories\WorkmanInterface;

class Workman extends EloquentReprisotory implements WorkmanInterface{  
     public function __construct(WI $model) {
        parent::__construct($model);
    }
   
    public function create($input) {
        $workman =  $this->getModel(); 
       
        
        $userModel = $workman->user()->getModel();
        $user = new $userModel (); 
        $user->assign($input);
        $user->save();
      
        $workman->username = $input['UserName'];
        $workman->payment = $input['Payment'];
        $workman->profession = $input['Profession'];
        $workman->save();
               
    }  
    
    public function update($id,$input) {
        $workman = $this->getModel()->findOrFail($id);
                
        $user = $workman->user()->first();
        $user->assign($input);
        $user->save($input);
        
        
        $workman->payment = $input['Payment'];
        $workman->profession = $input['Profession'];
        $workman->save();
    } 
    
    public function getById($id) {
       return  $this->model->join('users','workmans.UserName','=','users.UserName')->findOrFail($id); 
    }
    
    public function getAllWithName($param) {
       return  $this->model->join('users','workmans.UserName','=','users.UserName')->where('users.UserName', 'LIKE', "%$param%")->get();
    }  
    
    public function getAll() {        
        
        return  $this->model
                ->with('User')->get();
      
    }

    public function comments($id) {
       return $this->model->findOrFail($id)->comments();
    }

    public function votes($id) {
        return $this->model->findOrFail($id)->votes();
    }
    public function user($id) {
        return $this->model->user();
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

