<?php namespace App\Http\Controllers;
use DB;
use URL;
use Auth;
use Input;
use Config;
use Request;
use Redirect;
use Response;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $last = DB::table('news')->where('publi',2)->orderBy('created_at', 'desc')->take(70)->get();
        $laster = DB::table('news')->where('publi',2)->orderBy('created_at', 'desc')->first();
        $best = DB::table('news')->where('publi',3)->orderBy('created_at', 'desc')->take(15)->get();
        $spec = DB::table('news')->where('publi',4)->orderBy('created_at', 'desc')->take(15)->get();
        $one = DB::table('news')->where('publi',5)->orderBy('created_at', 'desc')->first();
        $note = DB::table('news')->where('publi',6)->orderBy('created_at', 'desc')->take(7)->get();
        $report = DB::table('news')->where('publi',7)->orderBy('created_at', 'desc')->take(5)->get();
        $talk = DB::table('news')->where('publi',8)->orderBy('created_at', 'desc')->take(5)->get();
		return view('home')->with(array('laster' => $laster,'last' => $last, 'best' => $best, 'spec' => $spec,
            'one' => $one, 'note' => $note, 'report' => $report, 'talk' => $talk));
	}

}
