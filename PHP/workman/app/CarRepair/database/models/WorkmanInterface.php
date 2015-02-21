<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CarRepair\Database\Models;

interface WorkmanInterface extends ModelInterface {

    public function comments();

    public function votes();
    public function user();
}
