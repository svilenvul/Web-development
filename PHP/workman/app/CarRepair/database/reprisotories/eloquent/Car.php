<?php
namespace CarRepair\Database\Reprisotories\Eloquent;

use CarRepair\Database\Models\CarInterface as CarModel;
use CarRepair\Database\Reprisotories\CarInterface;

class Car extends EloquentReprisotory implements CarInterface{
    public function __construct(CarModel $model) {
        parent::__construct($model);
    }

    public function create($input) {
        $car = new $this->model();
        $car->image = $input['picture'];
        $car->model = $input['model'];
        $car->year = $input['year'];
        $car->trademark = $input['trademark'];
        $car->enginesize = $input['enginesize'];
        $car->owner = $input['owner'];
        $car->save();
    }
  
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

