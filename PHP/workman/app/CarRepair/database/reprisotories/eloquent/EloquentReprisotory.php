<?php
namespace CarRepair\Database\Reprisotories\Eloquent;

use CarRepair\Database\Reprisotories\ReprisotoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class EloquentReprisotory implements ReprisotoryInterface {
    protected $model;
        
    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function getModel(){
        return $this->model;
    }
    
    public function setModel($model) {
        $this->model = $model;
    }
    
    public function getById($id) {
        return $this->model->findOrFail($id);
    }
    
    public function getFirstBy($param) {
        return $this->model->orderBy($param)->first();
    }
    
    public function get($number) {
        return $this->model->take($number)->get();
    }
    
    public function getAll() {
        return $this->model->get();
    }
    
    public function delete($id) {
        $entity = $this->model->findOrFail($id);
        $entity->delete();
    }
    
    public function update($id,$data) {
        $entity = $this->model->findOrFail($id);
        $entity->save($data);
    }
    
    abstract public function create($data);
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

