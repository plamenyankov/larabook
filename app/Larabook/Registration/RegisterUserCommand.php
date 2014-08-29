<?php
/**
 * Created by PhpStorm.
 * User: vipbs
 * Date: 19/07/14
 * Time: 09:21
 */

namespace Larabook\Registration;


class RegisterUserCommand {

    public $username;
    public $email;
    public $password;

    function __construct($username, $email, $password)
    {
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
    }

} 