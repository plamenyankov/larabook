<?php
/**
 * Created by PhpStorm.
 * User: vipbs
 * Date: 12/08/14
 * Time: 10:53
 */

namespace Larabook\Users;


class FollowUserCommand {

    public  $userId;
    public $userIdToFollow;

    function __construct($userId, $userIdToFollow)
    {
        $this->userId = $userId;
        $this->userIdToFollow = $userIdToFollow;
    }
}