<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LaravelController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('laravel.laravel');
		//
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
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        switch ($id) {
            case 'laravel':
                return view('laravel.laravel');

                break;

            case 'artisan':
                return view('laravel.artisan');

                break;
            case 'authentication':
                return view('laravel.authentication');

                break;
            case 'billing':
                return view('laravel.billing');

                break;
            case 'bus':
                return view('laravel.bus');

                break;
            case 'cache':
                return view('laravel.cache');

                break;
            case 'collections':
                return view('laravel.collections');

                break;
            case 'commands':
                return view('laravel.commands');

                break;
            case 'configuration':
                return view('laravel.configuration');

                break;
            case 'container':
                return view('laravel.container');

                break;
            case 'contracts':
                return view('laravel.contracts');

                break;
            case 'contributions':
                return view('laravel.contributions');

                break;
            case 'controllers':
                return view('laravel.controllers');

                break;
            case 'database':
                return view('laravel.database');

                break;
            case 'elixir':
                return view('laravel.elixir');

                break;
            case 'eloquent':
                return view('laravel.eloquent');

                break;
            case 'encryption':
                return view('laravel.encryption');

                break;
            case 'envoy':
                return view('laravel.envoy');

                break;
            case 'errors':
                return view('laravel.errors');

                break;
            case 'events':
                return view('laravel.events');

                break;
            case 'extending':
                return view('laravel.extending');

                break;
            case 'facades':
                return view('laravel.facades');

                break;
            case 'filesystem':
                return view('laravel.filesystem');

                break;
            case 'hashing':
                return view('laravel.hashing');

                break;
            case 'helpers':
                return view('laravel.helpers');

                break;
            case 'homestead':
                return view('laravel.homestead');

                break;
            case 'lifecycle':
                return view('laravel.lifecycle');

                break;
            case 'localization':
                return view('laravel.localization');

                break;
            case 'mail':
                return view('laravel.mail');

                break;
            case 'middleware':
                return view('laravel.middleware');

                break;
            case 'migrations':
                return view('laravel.migrations');

                break;
            case 'packages':
                return view('laravel.packages');

                break;
            case 'pagination':
                return view('laravel.pagination');

                break;
            case 'providers':
                return view('laravel.providers');

                break;
            case 'queries':
                return view('laravel.queries');

                break;
            case 'queues':
                return view('laravel.queues');

                break;
            case 'redis':
                return view('laravel.redis');

                break;
            case 'releases':
                return view('laravel.releases');

                break;
            case 'requests':
                return view('laravel.requests');

                break;
            case 'responses':
                return view('laravel.responses');

                break;
            case 'routing':
                return view('laravel.routing');

                break;
            case 'schema':
                return view('laravel.schema');

                break;
            case 'session':
                return view('laravel.session');

                break;
            case 'structure':
                return view('laravel.structure');

                break;
            case 'templates':
                return view('laravel.templates');

                break;
            case 'testing':
                return view('laravel.testing');

                break;

            case 'upgrade':
                return view('laravel.upgrade');

                break;
            case 'validation':
                return view('laravel.validation');

                break;


            case 'views':
                return view('laravel.views');

                break;

            default:
                return view('laravel.laravel');

        }


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
	}

}
