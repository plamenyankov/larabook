<?php

namespace Larabook\Registration\Events;


use Larabook\Users\User;

class UserRegistered {
    /**
     * @var \Larabook\Users\User
     */
    private $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }
}