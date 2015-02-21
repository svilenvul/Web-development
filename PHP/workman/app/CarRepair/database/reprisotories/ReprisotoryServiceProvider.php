<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author 888
 */

namespace CarRepair\Database\Reprisotories;

use Illuminate\Support\ServiceProvider;

class ReprisotoryServiceProvider extends ServiceProvider {

    public function register() {
        $this->registerCarReprisotory();
        $this->registerCommentReprisotory();
        $this->registerUserReprisotory();
        $this->registerVoteReprisotory();
        $this->registerWorkmanReprisotory();
    }

    public function registerCarReprisotory() {
        $this->app->singleton('CarRepair\Database\Reprisotories\CarInterface','CarRepair\Database\Reprisotories\Eloquent\Car');
    }

    public function registerCommentReprisotory() {
        $this->app->singleton('CarRepair\Database\Reprisotories\CommentInterface', 'CarRepair\Database\Reprisotories\Eloquent\Comment');
    }

    public function registerUserReprisotory() {
        $this->app->singleton('CarRepair\Database\Reprisotories\UserInterface', 'CarRepair\Database\Reprisotories\Eloquent\User');
    }

    public function registerVoteReprisotory() {
        $this->app->singleton('CarRepair\Database\Reprisotories\VoteInterface', 'CarRepair\Database\Reprisotories\Eloquent\Vote');
    }

    public function registerWorkmanReprisotory() {
        $this->app->singleton('CarRepair\Database\Reprisotories\WorkmanInterface', 'CarRepair\Database\Reprisotories\Eloquent\Workman');
    } 

}
