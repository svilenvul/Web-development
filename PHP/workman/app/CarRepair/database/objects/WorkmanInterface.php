<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CarRepair\Database\Objects;

use CarRepair\Database\Reprisotories\WorkmanInterface as WI;
use CarRepair\Database\Reprisotories\VoteInterface;
use CarRepair\Database\Reprisotories\CommentInterface;

interface WorkmanInterface {

    public function __construct(WI $user, 
            VoteInterface $vote, 
            CommentInterface $comment);
    public function workman();
    public function comments($id);
    public function votes($id);
}