<?php

use CarRepair\Validation\CommentValidator;
use CarRepair\Exceptions\ValidationException;
use CarRepair\Database\Reprisotories\CommentInterface;

class CommentController extends \BaseController {

    protected $_validator;

    public function __construct(CommentValidator $validator,
            CommentInterface $comment) {
        $this->_validator = $validator;                
        $this->comment = $comment;
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
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
    public function store($id) {
        $input = Input::all();
        try {
            $input['Date'] = date('Y-m-d H:i:s');
            $this->_validator->validate($input);
            $this->user->comments()->create($input);
            return Redirect::back()->with('message', 'Comment added');
        } catch (ValidationException $ex) {
            return Redirect::back()->withInput()->withErrors($ex->get_errors());
        } catch (QueryException $ex) {
            return Redirect::back()->withInput()->with('message', 'Username is incorrect');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id,$commentId) {       
       $latestDiscussion = $this->comment->getById($commentId);
       $answers = $this->comment->answers($commentId)->getAll();
       
       $view = View::make('comments.single', array(
            'latestDiscussion' => $latestDiscussion ,
            'answers' => $answers 
            ));
       $data = $view->render();
       return Response::json($data);
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
