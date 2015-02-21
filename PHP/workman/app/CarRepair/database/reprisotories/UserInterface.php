<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CarRepair\Database\Reprisotories;

use CarRepair\Database\Models\UserInterface as UI;

interface UserInterface extends ReprisotoryInterface {
    public function __construct(UI $user);
    public function comments($id);
    public function cars($id); 
    public function getAllWithName($name);
}
