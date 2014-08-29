<?php
use Larabook\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;
//use Larabook\Core\CommandBus;

class RegistrationController extends BaseController {
//    use CommandBus;

    /**
     * @var registrationForm
     */
    private $registrationForm;

    public function __construct(RegistrationForm $registrationForm){
        $this->registrationForm = $registrationForm;
        $this->beforeFilter('guest');
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

        $this->registrationForm->validate(Input::all());
//        extract(Input::only('username','email','password'));
//
//        $user = $this->execute(
//            new RegisterUserCommand($username, $email, $password )
//        );
        $user = $this->execute(RegisterUserCommand::class);

        Auth::login($user);
        Flash::success('Welcome abroad!');
		return Redirect::home()->with('flash_message','Hello');
	}


}
