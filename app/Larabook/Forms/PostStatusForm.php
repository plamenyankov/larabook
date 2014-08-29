<?php
/**
 * Created by PhpStorm.
 * User: vipbs
 * Date: 30/07/14
 * Time: 11:17
 */

namespace Larabook\Forms;


use Laracasts\Validation\FormValidator;

class PostStatusForm extends FormValidator{
    protected $rules = [
        'body' => 'required|min:5'
    ];
} 