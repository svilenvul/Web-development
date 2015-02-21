<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CarRepair\Database\Objects;

use CarRepair\Database\Reprisotories\UserInterface as UI;
use CarRepair\Database\Reprisotories\CommentInterface;
use CarRepair\Database\Reprisotories\CarInterface;

interface UserInterface{

    public function __construct(UI $user, 
            CommentInterface $comment,
            CarInterface $car);
    public function cars($id);
    public function comments($id);
    public function user();
}
