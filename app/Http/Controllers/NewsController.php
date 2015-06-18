<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\news;
use DB;
use URL;
use Auth;
use Input;
use Config;
use Redirect;
use Response;

class NewsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $data = DB::table('news')->get();
        return view('news.listnews')->with('data',$data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//

        return view('news.createnews');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
        $datetime = new \DateTime;
        $data = Input::only('title', 'image', 'abst', 'desc','dep','refre','publi');
        if ($data) {
            if (Auth::check()) {
                DB::table('news')->insert(array(
                    'title' => $data['title'],
                    'dep' => $data['dep'],
                    'publi' => $data['publi'],
                    'refre' => $data['refre'],
                    'image' => $data['image'],
                    'abst' => $data['abst'],
                    'descr' => $data['desc'],
                    'created_at' => $datetime
                ));
                return redirect()->back();
            }else{
                return view('layout.lnews')->with('data',"");
            }
        }else{
            return view('layout.lnews')->with('data',"");
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
        $news=DB::table('news')->where('id', $id)->first();
        $comment=DB::table('comment')->get();
        $replay=DB::table('replay')->get();
        return view('news.shownews')->with(array('data' => $news, 'comment' => $comment, 'replay' => $replay));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
        $news=DB::table('news')->where('id', $id)->first();
        return view('news.editnews')->with('news',$news);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
        $datetime = new \DateTime;
        $data = Input::only('title', 'dep',  'descr','');
        $data = Input::only('title', 'image', 'abst', 'desc','dep','refre','publi');
        if ($data) {
            if (Auth::check()) {
                DB::table('tag')
                    ->where('id', $id)
                    ->update(array(
                        'title' => $data['title'],
                        'dep' => $data['dep'],
                        'publi' => $data['publi'],
                        'refre' => $data['refre'],
                        'image' => $data['image'],
                        'abst' => $data['abst'],
                        'descr' => $data['desc'],
                        'updated_at' => $datetime
                    ));

                redirect('/');
            }else{
                redirect('/');
            }
        }else{
            redirect('/');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
        DB::table('news')
            ->where('id', $id)->delete();
        redirect('/');
	}
    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postScommand($id)
    {
        $datetime = new \DateTime;
        $data = Input::only('descrip');
        if ($data) {
            if (Auth::check()) {
                DB::table('comment')->insert(array(
                    'vote_up' => '0',
                    'vote_down' => '0',
                    'counter' => '0',
                    'user_id' => Auth::id(),
                    'news_id' => $id,
                    'descr' => $data['descrip'],
                    'created_at' => $datetime
                ));
                return redirect()->back();
            }else{
                return view('layout.lnews')->with('data',"");
            }
        }else{
            return view('layout.lnews')->with('data',"");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postSreplay($id)
    {
        $datetime = new \DateTime;
        $data = Input::only('descript');
        if ($data) {
            if (Auth::check()) {
                DB::table('replay')->insert(array(
                    'vote_up' => '0',
                    'vote_down' => '0',
                    'counter' => '0',
                    'user_id' => Auth::id(),
                    'comment_id' => $id,
                    'descr' => $data['descript'],
                    'created_at' => $datetime
                ));
                return redirect()->back();
            }else{
                return view('layout.lnews')->with('data',"");
            }
        }else{
            return view('layout.lnews')->with('data',"");
        }
    }


}
