<?php
/**
 * Created by PhpStorm.
 * User: vipbs
 * Date: 20/07/14
 * Time: 09:38
 */

namespace Larabook\Users;

class UserRepository {

    /**
     * Persist a user
     * @param User $user
     * @return mixed
     */
    public function save(User $user)
    {
        return $user->save();
    }

    /**
     * @param int $showUsers
     * @return mixed
     */
    public function getPaginated($showUsers = 120){
        return User::orderBy('username','asc')->paginate($showUsers);
    }

    /**
     * @param $username
     * @return mixed
     */
    public function findByUsername($username){
        return User::with(['statuses'=>function($query){
                $query->latest();
            }])->whereUsername($username)->first();
    }

    /**
     * Find a user by their id
     * @param $userId
     * @return mixed
     */
    public function findById($userId){
        return User::findOrFail($userId);
    }

    /**
     * Follow a larabook user
     * @param $userIdToFollow
     * @param User $user
     * @return mixed
     */
    public function follow($userIdToFollow,User $user){
        return $user->follows()->attach($userIdToFollow);
    }

    /**
     * Unfollow Larabook User
     * @param $userIdToUnfollow
     * @param User $user
     * @return mixed
     */
    public function unfollow($userIdToUnfollow,User $user){
        return $user->follows()->detach($userIdToUnfollow);
    }
} 