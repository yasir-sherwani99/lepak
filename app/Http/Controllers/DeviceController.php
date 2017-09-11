<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use Session;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $device = Device::all();
        return view('pages.view_device')->withDevice($device);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.add_device');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $device = new Device;
        
        $this->validate($request, [ 
               'dname' => 'required|min:4|unique:devices,deviceName',
               'manufact' => 'required',
               'serial' => 'required',
               'mac' => 'required|min:12|unique:devices,deviceMac',
               'dqty' => 'required'
            ]);

        $device->deviceName = $request->input('dname');
        $device->deviceManufac = $request->input('manufact');
        $device->deviceSerial = $request->input('serial');
        $device->deviceMac = $request->input('mac');
        $device->qty = $request->input('dqty');

        $device->save();

        Session::flash('success', 'Device has been added successfully.');
        return redirect()->route('device.index');

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
        $device = Device::findOrFail($id);
        return view('pages.edit_device')->withDevice($device);
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
               'dname' => 'required|min:4|unique:devices,deviceName',
               'manufact' => 'required',
               'serial' => 'required',
               'mac' => 'required|min:12|unique:devices,deviceMac',
               'dqty' => 'required'
            ]);
        
        $city = City::findOrFail($id);
       
        $device->deviceName = $request->input('dname');
        $device->deviceManufac = $request->input('manufact');
        $device->deviceSerial = $request->input('serial');
        $device->deviceMac = $request->input('mac');
        $device->qty = $request->input('dqty');
        $device->save();

        Session::flash('success','Device has been updated successfully.');
        return redirect()->route('device.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $device = Device::findOrFail($id);
        $device->delete();

        Session::flash('success','Dedevice has been deleted successfully.');
        return redirect()->route('device.index');
    }
}
