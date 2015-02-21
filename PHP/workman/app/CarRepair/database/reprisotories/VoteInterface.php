<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CarRepair\Database\Reprisotories;

use CarRepair\Database\Models\VoteInterface as VoteModel;

interface VoteInterface extends ReprisotoryInterface {

    public function __construct(VoteModel $vote);
    public function getAvarage();
}
