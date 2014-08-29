<?php
/**
 * Created by PhpStorm.
 * User: vipbs
 * Date: 19/07/14
 * Time: 09:33
 */

namespace Larabook\Registration;

use Larabook\Users\UserRepository;
use Laracasts\Commander\CommandHandler;
use Larabook\Users\User;
use Laracasts\Commander\Events\DispatchableTrait;

class RegisterUserCommandHandler implements CommandHandler{
    use DispatchableTrait;
protected $repository;
    public function __construct(UserRepository $repository){
        $this->repository = $repository;
    }
    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $user = User::register(
            $command->username, $command->email, $command->password
        );
        $this->repository->save($user);

       $this->dispatchEventsFor($user);

        return $user;
    }
}