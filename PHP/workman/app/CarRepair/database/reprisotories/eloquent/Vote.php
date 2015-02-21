<?php
namespace CarRepair\Database\Reprisotories\Eloquent;

use CarRepair\Database\Models\VoteInterface as VI;
use CarRepair\Database\Reprisotories\VoteInterface;

class Vote extends EloquentReprisotory implements VoteInterface {     
    public function __construct(VI $model) {
        parent::__construct($model);
    }
    public function create($input) {
        $vote = new $this->model();
        $vote->from = $input['from'];
        $vote->to = $input['to'];
        $vote->mark = $input['mark'];
        $vote->save();
    }
    
    public function getAvarage() {
        return $this->model->avg('Mark');
    }
}
