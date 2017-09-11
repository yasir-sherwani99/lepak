<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use Session;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loc = Location::all();
       return view('pages.view_location')->withLoc($loc);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.location_reg');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $loc = new Location;
         $loc->location=$request->input('lname');
         $loc->save();

         Session::flash('success','location has been added successfully');
         return redirect()->route('location.index', $loc->id);
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
        $loc = Location::findOrFail($id);
        return view('pages.edit_location')->withLoc($loc);
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
        $loc = Location::findOrFail($id);
        $loc->location = $request->input('lname');
        $loc->save();

        Session::flash('success','Location has been updated successfully');
        return redirect()->route('location.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loc = Location::findOrFail($id);
        $loc->delete();

        Session::flash('success','Location hs been deleted successfully');
        return redirect()->route('location.index');
    }
}
