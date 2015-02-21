<?php

use CarRepair\validation\CarValidator;
use CarRepair\Exceptions\ValidationException;
use CarRepair\Database\Reprisotories\CarInterface;

class CarController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    protected $_validator;

    public function __construct(CarValidator $validator, CarInterface $car) {
        $this->_validator = $validator;
        $this->car = $car;
    }

    public function index($id) {
        $user = $this->user->getById($id);
        $cars = $this->car->getAll();
        $message = Session::get('message');
        return View::make('cars', array('user' => $user, 'cars' => $cars, 'message' => $message));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id) {
        $form = View::make('cars.new', array('id' => $id));
        $renderedView = $form->render();
        return Response::json($renderedView);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($id) {
        $input = Input::all();
        $input['owner'] = $id;
        try {
            $validate_data = $this->_validator->validate($input);
            $this->car->create($input);
            return Redirect::to("/user/$id/car")->with('message', 'Car added');
        } catch (ValidationException $ex) {
            return Redirect::to("/user/$id/car")->withInput()->withErrors($ex->get_errors());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id,$carId) {
        $car = $this->car->getById($carId);
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
