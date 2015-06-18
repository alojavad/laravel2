<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\tag;
use Illuminate\Http\Request;
use DB;
use URL;
use Auth;
use Input;
use Config;
use Redirect;
use Response;

class TagController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        //$tag = tag::all();
        $tag = DB::table('tag')->get();
        return view('tags.tags')->with('tag',$tag);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
        $data = Input::only('title', 'dep',  'descr');
        if ($data) {
            if (Auth::check()) {
                DB::table('tag')->insert(array(
                    'title' => $data['title'],
                    'counter' => '0',
                    'dep' => $data['dep'],
                    'descr' => $data['descr'],
                    'created_at' => $datetime
                ));
                return view('tags.tags')->with('tag',"");
            }else{
                return view('tags.tags')->with('tag',"");
            }
        }else{
            return view('tags.tags')->with('tag',"");
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
        $tag=DB::table('tag')->where('id', $id)->first();
        return view('tags.edittag')->with('tag',$tag);
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
        $data = Input::only('title', 'dep',  'descr');
        if ($data) {
            if (Auth::check()) {
                DB::table('tag')
                    ->where('id', $id)
                    ->update(array('title' => $data['title'],
                        'dep' => $data['dep'],
                        'descr' => $data['descr'],
                        'updated_at' => $datetime));

                return view('tags.tags')->with('tag',"");
            }else{
                return view('tags.tags')->with('tag',"");
            }
        }else{
            return view('tags.tags')->with('tag',"");
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
        DB::table('tag')
            ->where('id', $id)->delete();
        return view('tags.tags')->with('tag',"");
	}

}
