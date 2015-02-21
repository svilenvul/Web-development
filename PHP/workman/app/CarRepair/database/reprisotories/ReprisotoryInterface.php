<?php
namespace CarRepair\Database\Reprisotories;

use CarRepair\Database\Models\ModelInterface;

interface ReprisotoryInterface{
    public function getModel();
    public function setModel($model);
    public function getAll();
    public function getById($id);
    public function get($number);
    public function getFirstBy($param);
    public function delete($id);
    public function update($id,$data);
    public function create($data);    
}
