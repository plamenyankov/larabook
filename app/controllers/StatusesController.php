<?php

//use Larabook\Core\CommandBus;
use Larabook\Forms\PostStatusForm;
use Larabook\Statuses\PublishStatusCommand;
use Larabook\Statuses\StatusRepository;


class StatusesController extends \BaseController {
//use CommandBus;

    protected $statusRepository;
    /**
     * @var Larabook\Forms\PostStatusForm
     */
    private $postStatusForm;

    function __construct(StatusRepository $statusRepository, PostStatusForm $postStatusForm)
    {
        $this->statusRepository = $statusRepository;
        $this->postStatusForm = $postStatusForm;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $statuses = $this->statusRepository->getFeedForUser(Auth::user());

		return View::make('statuses.index',compact('statuses'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{   $input = Input::get();
        $input['userId'] = Auth::user()->id;
        $body = Input::only('body');
        $this->postStatusForm->validate($body);
//        $this->execute(new PublishStatusCommand(Input::get('body'),Auth::user()->id));
        $this->execute(PublishStatusCommand::class,$input);
        Flash::success('Your status has been updated!');
       return Redirect::back();
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
	public function destroy($id)
	{
		//
	}


}
