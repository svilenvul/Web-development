<?php

namespace CarRepair\Database\Reprisotories\Eloquent;


use CarRepair\Database\Models\UserInterface as UserModel;
use CarRepair\Database\Reprisotories\UserInterface;

class User extends EloquentReprisotory implements UserInterface {

    public function __construct(UserModel
    $model) {
        parent::__construct($model);
    }

    public function create($input) {
        $user = new $this->model();
        $user->assign($input);
        $user->save();
    }

    public function update($id, $input) {
        $user = $this->model->findOrFail($id);
        $user->assign($input);
        $user->save();
    }  

    public function getAllWithName($param) {
        return $this->model->where('users.UserName', 'LIKE', "%$param%")->get();
    }

    public function cars($id) {
        return $this->model->findOrFail($id)->cars();
    }

    public function comments($id) {
       return $this->model->findOrFail($id)->comments();
    }
   

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

