<?php
/**
 * Created by PhpStorm.
 * User: vipbs
 * Date: 26/07/14
 * Time: 16:20
 */

namespace Larabook\Forms;
use Laracasts\Validation\FormValidator;


class SignInForm extends FormValidator{
    protected $rules = [
        'email' => 'required',
        'password' => 'required'
    ];
} 