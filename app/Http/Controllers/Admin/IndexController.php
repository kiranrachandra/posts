<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;   
use App\Http\Controllers\Controller;

class IndexController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
//        $this->middleware('admin'); 
    }    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {	  
        return view('admin.index');
    }
 
}
