<?php
namespace CarRepair\Authorization;
use  Illuminate\Auth\Guard;

class CustomGuard extends Guard {
    public function isOwner($id){
        if(parent::check() && parent::user()->UserName === $id) {
            return true;
        } else {
            return false;
        }
    }
    public function hasVotedTo($toId) {
        if(parent::user()->votes()->where('To','=',$toId)->first()) {
            return true;
        } else {
            return false;
        }
    }
}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

