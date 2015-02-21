<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CarRepair\Database\Objects\Eloquent;

use CarRepair\Database\Objects\UserInterface;
use CarRepair\Database\Reprisotories\UserInterface as UI;
use CarRepair\Database\Reprisotories\CommentInterface;
use CarRepair\Database\Reprisotories\CarInterface;

class User implements UserInterface {

    private $comments;
    private $cars;
    private $user;

    public function __construct(UI $user, CommentInterface $comments, CarInterface $cars) {
        $this->user = $user;
        $this->cars = $cars;
        $this->comments = $comments;
    }

    public function comments($id) {
        $model = $this->user->comments($id);
        $this->comments->setModel($model);
        return $this->comments;
    }
    public function getComments (){
        return $this->comments;
    }
    public function cars($id) {
        $model = $this->user->cars($id);
        $this->cars->setModel($model);
        return $this->cars;
    }

    public function user() {
        return $this->user;
    }


}
