<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace CarRepair\Database\Objects\Eloquent;

use CarRepair\Database\Reprisotories\WorkmanInterface as WI;
use CarRepair\Database\Reprisotories\CommentInterface;
use CarRepair\Database\Reprisotories\VoteInterface;
use CarRepair\Database\Objects\WorkmanInterface;

class Workman implements WorkmanInterface {

    private $votes;
    private $comments;
    private $workman;
    
    public function __construct(WI $workman, 
            VoteInterface $votes, 
            CommentInterface $comments) {        
        $this->votes = $votes;
        $this->comments = $comments;
        $this->workman = $workman;
    }

    public function votes($id) {
        $model = $this->workman->getById($id)->votes();
        $this->votes->setModel($model);
        return $this->votes;
    }

    public function comments($id) {
        $model = $this->workman->getById($id)->comments();
        $this->comments->setModel($model);
        return $this->comments;
    }
    public function workman(){
        return $this->workman;
    }    
  
}
