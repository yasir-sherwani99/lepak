<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Session;
use DB;
use Hash;
use Illuminate\Support\Facades\Input;
use Image;
use Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::all();
        return view('pages.view_admin')->withAdmin($admin);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city = DB::table('cities')->get();
        return view('pages.add_admin')->withCity($city);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $admin = new Admin;

         $this->validate($request, [ 
               'fname' => 'required|min:4|unique:devices,deviceName',
               'lname' => 'required',
               'email' => 'required|unique:employees,email',
               'address' => 'required',
               'cnic1' => 'required|min:5',
               'cnic2' => 'required|min:7',
               'cnic3' => 'required|min:1',
               'city' => 'required',
               'mob' => 'required|min:11',
               'desig' => 'required',
               'password' => 'required',
               'img' => 'sometimes|image',
            ]);
        
        $thumb = "thumb";
        $status = "1";
        $password = Input::get('password');
        $hashed = Hash::make($password);

        $admin->fname = $request->input('fname');
        $admin->lname = $request->input('lname');
        $admin->email = $request->input('email');
        $admin->address = $request->input('address');
        $admin->cnic1 = $request->input('cnic1');
        $admin->cnic2 = $request->input('cnic2');
        $admin->cnic3 = $request->input('cnic3');
        $admin->city_id = $request->input('city');
        $admin->mobile = $request->input('mob');
        $admin->designation = $request->input('desig');
        $admin->password = $hashed;
        
        if($request->hasFile('img')){
            $image = $request->file('img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('emp_images/'.$filename);
            Image::make($image)->resize(171, 180)->save($location);

            $admin->image = $filename;
        }

        $admin->status = $status;
        $admin->thumb = $thumb;
        
        $admin->save();

        Session::flash('success', 'Admin has been added successfully.');
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adm = Admin::findOrFail($id);
        //dd($empp);
        return view('pages.admin_details')->withAdm($adm);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = DB::table('cities')->get();
        $admin = Admin::findOrFail($id);
        return view('pages.edit_admin')->withAdmin($admin)->withCity($city);
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
        $admin = Admin::findOrFail($id);

         $this->validate($request, [ 
               'fname' => 'required|min:4|unique:devices,deviceName',
               'lname' => 'required',
               'email' => 'required|unique:employees,email',
               'address' => 'required',
               'cnic1' => 'required|min:5',
               'cnic2' => 'required|min:7',
               'cnic3' => 'required|min:1',
               'city' => 'required',
               'mob' => 'required|min:11',
               'desig' => 'required',
               'img' => 'sometimes|image',
            ]);
        
        $thumb = "thumb";
        $status = "1";
        
        $admin->fname = $request->input('fname');
        $admin->lname = $request->input('lname');
        $admin->email = $request->input('email');
        $admin->address = $request->input('address');
        $admin->cnic1 = $request->input('cnic1');
        $admin->cnic2 = $request->input('cnic2');
        $admin->cnic3 = $request->input('cnic3');
        $admin->city_id = $request->input('city');
        $admin->mobile = $request->input('mob');
        $admin->designation = $request->input('desig');
        
        if($request->hasFile('img')){
            $image = $request->file('img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('emp_images/'.$filename);
            Image::make($image)->resize(171, 180)->save($location);
            $oldfilename = $admin->image;

            $admin->image = $filename;

            Storage::delete($oldfilename);
        }

        $admin->status = $status;
        $admin->thumb = $thumb;
        
        $admin->save();

        Session::flash('success', 'Admin has been Updated successfully.');
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        Session::flash('success','Admin hs been deleted successfully');
        return redirect()->route('admin.index');
    }
}
