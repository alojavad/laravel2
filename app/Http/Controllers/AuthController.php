<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AuthController extends Controller {

    /**
     * Show the application login form.
     *
     */
    public function getLogin()
    {
        /*
        if (Auth::check())
            return Redirect::action('TopicController@index') -> withMessage('Login successful');
        else
            return View::make('login');
        */

        return view('auth.login');
    }


    /**
     * Login user to application
     *
     */
    public function postLogin()
    {
        $data = Input::all();

        $rules = array(
            'Username' => array('required'),
            'Password' => array('required')
        );

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return Redirect::back() -> withErrors($validator) -> withInput(Input::except('password'));
        }
        else {
            $username = Input::get('Username');
            $password = Input::get('Password');

            if (Auth::attempt(array('username' => $username, 'password' => $password)))
            {
                return Redirect::back() -> withMessage('Login successful');
            }
            return Redirect::action('AuthController@getLogin') -> withErrors('Your username or password is incorrect.') -> withInput(Input::except('password'));
        }
    }
    /**
     * Log the user out of the application.
     *
     * @return Response
     */
    public function getLogout()
    {
        Auth::logout();
        return Redirect::action('TopicController@index') -> withMessage('Logout successful');
    }



    /**
     * Show the application registration form.
     *
     * @return Response
     */
    public function getRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  RegisterRequest  $request
     * @return Response
     */
    public function postRegister(RegisterRequest $request)
    {
        $this->user->email = $request->email;
        $this->user->password = bcrypt($request->password);
        $this->user->save();
        //code for registering a user goes here.
        $this->auth->login($this->user);
        return redirect('/dash-board');
    }
}

