<?php namespace Larabook\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Larabook\Registration\Events\UserRegistered;
use Illuminate\Support\Facades\Hash;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class User extends \Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator, PresentableTrait;

    protected $fillable = ['username','email','password'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
    /**
     * Path to the presenter of user
     * @var string
     */
    protected $presenter = 'Larabook\Users\UserPresenter';
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    /**
     * Register a new user
     * @param $username
     * @param $email
     * @param $password
     */
    public static function register($username, $email, $password){

        $user = new static(compact('username', 'email', 'password'));

        $user->raise(new UserRegistered($user));

        return $user;
    }
    public function getAuthPassword()
    {
        return $this->password;
    }
    /**
     * Password must be always hashed
     * @param $password
     */
    public function setPasswordAttribute($password){
        $this->attributes['password'] = Hash::make($password);
    }
    public function statuses(){
        return $this->hasMany('Larabook\Statuses\Status');
    }
    public function is(User $user){
        return $this->username == $user->username;
    }
    public function follows(){
        return $this->belongsToMany(self::class,'follows','follower_id','followed_id')
                    ->withTimestamps();
    }

    /**
     * @return mixed
     */
    public function follower(){
        return $this->belongsToMany(self::class,'follows','followed_id','follower_id')
                    ->withTimestamps();
    }
    public function isFollowedBy($otherUser){
        $idsOtherUserFollows = $otherUser->follows()->lists('followed_id');
        return in_array($this->id,$idsOtherUserFollows);
    }
}
