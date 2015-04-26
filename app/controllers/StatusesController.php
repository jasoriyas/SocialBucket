<?php

use SocialBucket\Forms\PublishStatusForm;
use SocialBucket\Statuses\PublishStatusCommand;
use SocialBucket\Statuses\StatusRepository;

/**
 * Class StatusesController
 */
class StatusesController extends \BaseController {


    /**
     * @var
     */
    protected $statusRepository;

    /**
     * @var PublishStatusForm
     */
    protected $publishStatusForm;

    /**
     * @param StatusRepository $statusRepository
     * @param PublishStatusForm $publishStatusForm
     */
    function __construct(PublishStatusForm $publishStatusForm, StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
        $this->publishStatusForm = $publishStatusForm;

    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $statuses = $this->statusRepository->getFeedForUser(Auth::user());

		return View::make('statuses.index', compact('statuses'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Save a new status
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = array_add(Input::get(), 'userId', Auth::id());

        $this->publishStatusForm->validate($input);

        $this->execute(PublishStatusCommand::class, $input);

        Flash::message('Your status has been updated!');
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
