<?php namespace CodeCommerce\Http\Controllers\Auth;

use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\UserProvider;
use CodeCommerce\User;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'getLogout']);
	}

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'cnpjcpf' => 'required|max:14|min:11|unique:users',
			'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function create(array $data)
    {
        return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'cnpjcpf' => $data['cnpjcpf'],
			'inscricao' => $data['inscricao'],
			'end_rua' => $data['end_rua'],
			'end_bairro' => $data['end_bairro'],
			'end_cidade' => $data['end_cidade'],
			'end_uf' => $data['end_uf'],
			'end_cep' => $data['end_cep'],
			'end_telefone' => $data['end_telefone'],
			'password' => bcrypt($data['password']),
        ]);
    }

}
