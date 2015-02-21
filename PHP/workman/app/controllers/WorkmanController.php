<?php

use CarRepair\Exceptions\ValidationException;
use CarRepair\Validation\WorkmanValidator;
use CarRepair\Database\Objects\WorkmanInterface;

class WorkmanController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct(WorkmanInterface $workman, WorkmanValidator $workmanValidator) {
        $this->workmanValidator = $workmanValidator;
        $this->workman = $workman;
    }

    public function index() {
        $filter = Input::get('UserName');

        if ($filter) {
            $users = $this->workman->workman()->getAllWithName($filter);
            $users->each(function ($user) {
                $user->user();
            });
        } else {
            $users = $this->workman->workman()->getAll();
        }

        $allcars = array();
        $votes = array();
        foreach ($users as $user) {
            $votes[$user->UserName] = $this->workman->votes($user->UserName)->getAvarage();
        }
        return View::make('profiles.workman.list', array(
                    'users' => $users,
                    'allcars' => $allcars,
                    'resource' => 'workman',
                    'votes' => $votes));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
         return View::make('profiles.workman.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $input = Input::all();
        try {
            $this->workmanValidator->validate($input);
            $this->workman->workman()->create($input);

            return Redirect::to('/login')->with('message', 'Workman created');
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
        try {
            $loggedUser = Auth::user()->UserName;
            $user = $this->workman->workman()->getById($id);
            $mark = $this->workman->votes($id)->getAvarage();

            if (Auth::isOwner($id)) {
                $comments = $this->workman->comments($id)->getAll();
                $latestDiscussion = $this->workman->comments($id)->getFirstBy('Date');
                if ($latestDiscussion) {
                    $answers = $this->workman->comments($id)->answers($latestDiscussion->Id)->getAll();
                } else {
                    $answers = NULL;
                }
            } else {
                $comments = NULL;
                $latestDiscussion = NULL;
                $answers = NULL;
            }

            return View::make('profiles.workman.single', array(
            'user' => $user,
            'loggedUser' => $loggedUser,
            'mark' => $mark,
            'comments' => $comments,
            'latestDiscussion' => $latestDiscussion,
            'answers' => $answers,
            'resource' => 'workman'
            ));
        } catch (Illuminate \ Database \ Eloquent \ ModelNotFoundException $ex) {
            return Redirect::to("/user/$id")->with('message', 'You are not registered as workman.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $user = $this->workman->workman()->getById($id);
        $view = View::make('profiles.workman.update')->withUser($user);
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
            $this->workmanValidator->validate($input);
            $this->workman->workman()->update($id,$input);

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

    public function login() {
        $workman = Input::get('username');
        if (Auth::attempt(['UserName' => Input::get('username'), 'password' => Input::get('password')])) {
            return Redirect::To("/workman/$username");
        } else {
            return Redirect::To('/workman/login')->with('message', 'Username or password are incorrect');
        }
    }

    public function logOut() {
        Auth::logout();
        return Redirect::To('/workman/login')->with('message', 'You have been loggged out.');
    }

}
