<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace CarRepair\Database\Models;

use Illuminate\Support\ServiceProvider;

class ModelServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->singleton('CarRepair\Database\Models\CarInterface', 'CarRepair\Database\Models\Eloquent\Car');
        $this->app->singleton('CarRepair\Database\Models\UserInterface', 'CarRepair\Database\Models\Eloquent\User');
        $this->app->singleton('CarRepair\Database\Models\CommentInterface', 'CarRepair\Database\Models\Eloquent\Comment');
        $this->app->singleton('CarRepair\Database\Models\WorkmanInterface', 'CarRepair\Database\Models\Eloquent\Workman');
        $this->app->singleton('CarRepair\Database\Models\VoteInterface', 'CarRepair\Database\Models\Eloquent\Vote');
               
    }
}
