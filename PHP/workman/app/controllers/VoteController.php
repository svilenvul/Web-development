<?php

use CarRepair\validation\VoteValidator;
use CarRepair\Exceptions\ValidationException;
use CarRepair\Database\Reprisotories\VoteInterface;


class VoteController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct(VoteValidator $validator, 
            VoteInterface $vote) {
        $this->_validator = $validator;
        $this->vote = $vote;       
    }

    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($fromId,$toId) {        
        $input = Input::all();
        $input['from']=$fromId;
        $input['to'] = $toId;        
        try {
            $this->_validator->validate($input);
            $this->vote->create($input);
            return Redirect::to("workman/$toId")->with('message', 'Vote added');
        } catch (ValidationException $ex) {
            return Redirect::to("workman/$toId")->withInput()->withErrors($ex->get_errors());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}
