<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use Session;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('pages.view_city')->withCities($cities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.city_registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $city = new City;
        
        $this->validate($request, [ 
               'cname' => 'required|min:4|unique:cities,cityName'
            ]);

        $city->cityName = $request->input('cname');
        $city->save();

        Session::flash('success','City has been added successfully.');
        return redirect()->route('city.index', $city->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::findOrFail($id);
        return view('pages.edit_city')->withCity($city);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [ 
               'cname' => 'required|min:4|unique:cities,cityName'
            ]);
        $city = City::findOrFail($id);
        $city->cityName = $request->input('cname');
        $city->save();

        Session::flash('success','City has been updated successfully.');
        return redirect()->route('city.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        Session::flash('success','City has been deleted successfully.');
        return redirect()->route('city.index');
    }
}
