<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getWebsite(){
    	return view('pages.index');
    }

     public function getAdmin(){
    	return view('pages.add_admin');
    }

    public function getEmployee(){
    	return view('pages.add_employee');
    }

    public function getTerminal(){
    	return view('pages.add_terminal');
    }

    public function getDevice(){
    	return view('pages.add_device');
    }

    public function getSites(){
    	return view('pages.available_site');
    }

    public function getAvailabel_emp(){
    	return view('pages.available_employee');
    }

    public function getAvailable_device(){
    	return view('pages.available_device');
    }




    public function getSite_registration(){
    	return view('pages.site_registration');
    }

    public function getCity_registration(){
    	return view('pages.city_registration');
    }


    public function getLocation_registration(){
    	return view('pages.location_reg');

    }




}
