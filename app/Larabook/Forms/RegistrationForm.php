<?php namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

class RegistrationForm extends FormValidator{

    protected $rules = [
        'username' => 'required|min:3|max:15|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed'
    ];
}