<?php namespace Larabook\Users;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter {

    /**
     * @return string
     */
    public function gravatar($size=30)
    {
        $email = md5($this->email);
        return "//www.gravatar.com/avatar/{$email}?s={$size}";
    }

    /**
     * @return string
     */
    public function followersCount(){
        $count = $this->entity->follower()->count();
        $follow = str_plural('Follower',$count);
        return $count. ' '.$follow;
    }
    public function statusCount(){
        $count = $this->entity->statuses()->count();
        $status = str_plural('Status',$count);
        return $count. ' '.$status;
    }

} 