<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use Session;
use DB;

class SitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $site = Site::all();
        return view('pages.view_site')->withSite($site);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $loc = DB::table('locations')->get();
         return view('pages.site_registration')->withLoc($loc);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $site = new Site;
    
        $site->siteName = $request->input('sname');
        $site->location_id = $request->input('location');
        $site->save();

        Session::flash('success','Site has been added successfully.');
        return redirect()->route('site.index', $site->id);
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
        $loc = DB::table('locations')->get();
        $site = Site::findOrFail($id);
        return view('pages.edit_site')->withSite($site)->withLoc($loc);
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
        $site = Site::findOrFail($id);
        $site->siteName = $request->input('sname');
        $site->location_id = $request->input('location');
        $site->save();

        Session::flash('success','Sites has been updated successfully');
        return redirect()->route('site.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $site = Site::findOrFail($id);
        $site->delete();

        Session::flash('success','Sites hs been deleted successfully');
        return redirect()->route('site.index');

    }
}
