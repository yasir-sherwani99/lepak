<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Session;
use DB;
use Hash;
use Illuminate\Support\Facades\Input;
use Image;
use Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $emp = Employee::all();
        return view('pages.view_employee')->withEmp($emp);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city = DB::table('cities')->get();
        return view('pages.add_employee')->withCity($city);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $emp = new Employee;

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

        $emp->fname = $request->input('fname');
        $emp->lname = $request->input('lname');
        $emp->email = $request->input('email');
        $emp->address = $request->input('address');
        $emp->cnic1 = $request->input('cnic1');
        $emp->cnic2 = $request->input('cnic2');
        $emp->cnic3 = $request->input('cnic3');
        $emp->city_id = $request->input('city');
        $emp->mobile = $request->input('mob');
        $emp->designation = $request->input('desig');
        $emp->password = $hashed;
        
        if($request->hasFile('img')){
            $image = $request->file('img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('emp_images/'.$filename);
            Image::make($image)->resize(171, 180)->save($location);

            $emp->image = $filename;
        }

        $emp->status = $status;
        $emp->thumb = $thumb;
        
        $emp->save();

        Session::flash('success', 'Employee has been added successfully.');
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        //dd($empp);
        return view('pages.employee_details')->withEmployee($employee);
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
        $emp = Employee::findOrFail($id);
        return view('pages.edit_employee')->withEmp($emp)->withCity($city);
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
        $emp = Employee::findOrFail($id);

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
        
        $emp->fname = $request->input('fname');
        $emp->lname = $request->input('lname');
        $emp->email = $request->input('email');
        $emp->address = $request->input('address');
        $emp->cnic1 = $request->input('cnic1');
        $emp->cnic2 = $request->input('cnic2');
        $emp->cnic3 = $request->input('cnic3');
        $emp->city_id = $request->input('city');
        $emp->mobile = $request->input('mob');
        $emp->designation = $request->input('desig');
        
        if($request->hasFile('img')){
            $image = $request->file('img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('emp_images/'.$filename);
            Image::make($image)->resize(171, 180)->save($location);
            $oldfilename = $emp->image;

            $emp->image = $filename;

            Storage::delete($oldfilename);
        }

        $emp->status = $status;
        $emp->thumb = $thumb;
        
        $emp->save();

        Session::flash('success', 'Employee has been Updated successfully.');
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp = Employee::findOrFail($id);
        $emp->delete();

        Session::flash('success','Employee hs been deleted successfully');
        return redirect()->route('employee.index');
    }
}
