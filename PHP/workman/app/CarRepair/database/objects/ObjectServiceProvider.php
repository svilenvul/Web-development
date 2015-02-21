<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace CarRepair\Database\Objects;

use Illuminate\Support\ServiceProvider;



class ObjectServiceProvider extends ServiceProvider {

    public function register() {
        $this->registerUser();
        $this->registerWorkman();
    }

    public function registerUser() {
        $this->app->singleton('CarRepair\Database\Objects\UserInterface','CarRepair\Database\Objects\Eloquent\User' );
    }

    public function registerWorkman() {
        $this->app->singleton('CarRepair\Database\Objects\WorkmanInterface', 'CarRepair\Database\Objects\Eloquent\Workman');        
    }
  
}
