<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.user.index');
    }
 
    /**
     * get list of users
     * @return json array
     */
    public function users() {
        $oUsers = User::orderBy('id', 'DESC')->get();
        $aUsers = [];
        $i = 0;
        foreach ($oUsers as $oUser) { 
            $aUsers[$i] = $oUser->toArray(); 
            $i++;
        }
        return $aUsers;
    }
     

}
