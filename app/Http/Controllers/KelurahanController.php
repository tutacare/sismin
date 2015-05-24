<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Kecamatan;
use App\Kelurahan;
use \Auth, \Redirect, \Validator, \Input, \Session;
use Illuminate\Http\Request;

class KelurahanController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Auth::check())
		{
			$kelurahanku = Kelurahan::all();
			return view('kelurahan.index')->with('kelurahan', $kelurahanku);
		} 
		else
		{
			return Redirect::to('/auth/login');
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Auth::check())
		{
			$kecamatanku = Kecamatan::lists('nama_kecamatan', 'id');
			return view('kelurahan.create')->with('kecamatan', $kecamatanku);;
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Auth::check())
		{
			$rules = array(
	            'kecamatan_id' => 'required',
	            'nama_kelurahan' => 'required',
	        );
	        $validator = Validator::make(Input::all(), $rules);
	        // process the login
	        if ($validator->fails()) {
	            return Redirect::to('kelurahan/create')
	                ->withErrors($validator)
	                ->withInput(Input::except('password'));
	        } else {
	            // store
	            $kelurahanku = new Kelurahan;
	            $kelurahanku->kecamatan_id = Input::get('kecamatan_id');
	            $kelurahanku->nama_kelurahan = Input::get('nama_kelurahan');
	            $kelurahanku->save();
	            // redirect
	            Session::flash('message', 'Berhasil membuat Kelurahan!');
	            return Redirect::to('kelurahan');
	        }
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