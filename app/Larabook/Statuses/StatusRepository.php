<?php
namespace Larabook\Statuses;

use Larabook\Users\User;
class StatusRepository {
    public function getAllForUser($user){

        return Status::whereUserId($user)->latest()->get();
    }
    public function save(Status $status, $userId){

    return User::find($userId)->statuses()->save($status);

    }
    public function getFeedForUser(User $user){
        $ids = $user->follows()->lists('followed_id');
        $ids[]=$user->id;
        return Status::whereIn('user_id',$ids)->latest()->get();
    }
} 