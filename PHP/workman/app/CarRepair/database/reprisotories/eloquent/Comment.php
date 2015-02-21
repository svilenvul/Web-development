<?php

namespace CarRepair\Database\Reprisotories\Eloquent;

use CarRepair\Database\Models\CommentInterface as CI;
use CarRepair\Database\Reprisotories\CommentInterface;

class Comment extends EloquentReprisotory implements CommentInterface{

    public function __construct(CI $model) {
        parent::__construct($model);
    }

    public function getAll() {
        return $this->getModel()->orderBy('Date')->get();
    }

    public function create($input) {
        $comment = new $this->model();
        $comment->Text = $input['Text'];
        $comment->Date = $input['Date'];
        $comment->From = $input['From'];
        if (isset($input['To'])) {
            $comment->To = $input['To'];
        }
        if (isset($input['About'])) {
            $comment->About = $input['About'];
        }
        $comment->save();
    }
    
    public function answers($id){
        $model = $this->model->findOrFail($id)->answers();
        $this->setModel($model);
        return $this;
    }    
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



