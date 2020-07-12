<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class PageController extends Controller
{
    // halaman listing
    public function index(Request $request)
    {
    	if(Auth::check()==true){ // sudah login
            return redirect('/spp_view');  
    	}else{
    		return redirect('login');
    	}
    }
}