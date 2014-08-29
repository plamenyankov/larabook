<?php


use Larabook\Forms\SignInForm;


class SessionsController extends \BaseController {

    /**
     * @var Larabook\Forms\SignInForm
     */
    private $validation;

    public function __construct(SignInForm $validation){

        $this->validation = $validation;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.login');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

        $formData = Input::only('email','password');
        $this->validation->validate($formData);
        if(!Auth::attempt($formData)){
            Flash::message('We were unable to sign you in! Please check your credentials!');
            return Redirect::back()->withInput();
        }
            Flash::message('Welcome back!');
            return Redirect::intended('statuses');


	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
	Auth::logout();
        return Redirect::home();
	}


}
