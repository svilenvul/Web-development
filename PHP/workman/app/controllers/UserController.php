<?php

use CarRepair\validation\UserValidator;
use CarRepair\Exceptions\ValidationException;



class UserController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct(UserValidator $userValidator,
 CarRepair\Database\Objects\UserInterface $user) {
        $this->userValidator = $userValidator;
        $this->user = $user;       
    }

    public function index() {
        $filter = Input::get('UserName');
        if ($filter) {
            $users = $this->user->user()->getAllWithName($filter);
        } else {
            $users = $this->user->user()->getAll();
        }
        
        $allcars = array();
        foreach($users as $user){
            $allcars[$user->UserName] = $this->user->cars($user->UserName)->get(2);
        }        
        return View::make('profiles.user.list', array('users' => $users,'allcars'=>$allcars,'resource' => 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
         return View::make('profiles.user.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $input = Input::all();
        try {
            $this->userValidator->validate($input);
            $this->user->user()->create($input);
            return Redirect::to('/login')->with('message', 'User created');
        } catch (ValidationException $ex) {
            return Redirect::back()->withInput()->withErrors($ex->get_errors());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $user = $this->user->user()->getById($id);
        $cars = $this->user->cars($id)->get(2);        
        $message = Session::get('message');
        if(Auth::isOwner($id)){
            $comments = $this->user->comments($id)->getAll();
            $latestDiscussion = $this->user->comments($id)->getFirstBy('Date');
            if($latestDiscussion) {
                $answers = $this->user->getComments()->answers($latestDiscussion->Id)->getAll();
            }else {
                $answers = NULL;
            }
            
        } else {
            $comments =NULL;
            $latestDiscussion = NULL;
            $answers = NULL;
        } 
        return View::make('profiles.user.single', array(
            'user' => $user,
            'cars'=>$cars,
            'comments'=>$comments,
            'latestDiscussion' =>$latestDiscussion ,
            'answers' => $answers,
            'message' => $message,
            'resource' => 'user'
            ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $user = $this->user->user()->getById($id);
        $view = View::make('profiles.user.update')->withUser($user);
        return $view;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $input = Input::all();
        try {
            $this->userValidator->validate($input);
            $this->user->user()->update($id,$input);
            return Redirect::to('/login')->with('message', 'User updated');
        } catch (ValidationException $ex) {
            return Redirect::back()->withInput()->withErrors($ex->get_errors());
        }
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

    public function upgrade($id) {
        $user = $this->user->user()->getById($id);
        $view = View::make('profiles.user.upgrade')->withUser($user);
        return $view;
    }

}
