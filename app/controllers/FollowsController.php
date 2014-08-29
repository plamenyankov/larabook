<?php

use Larabook\Users\FollowUserCommand;
use Larabook\Users\UnfollowUserCommand;

class FollowsController extends \BaseController {

	/**
	 * Store a newly created resource in storage.
	 * POST /follows
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = array_add(Input::get(),'userId',Auth::user()->id);
        $user = $this->execute(FollowUserCommand::class,$input);
        Flash::success('You are now following'.$user->username);
        return Redirect::back();
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /follows/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($userIdToUnfollow)
	{
        $input=array_add(Input::get(),'userId',Auth::id());
//		Auth::user()->follows()->detach($id);
        $this->execute(UnfollowUserCommand::class,$input);
        Flash::success('You now unfollow this user');
        return Redirect::back();
	}

}