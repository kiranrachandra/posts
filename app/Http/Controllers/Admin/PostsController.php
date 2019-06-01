<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Posts;
use App\User; 

class PostsController extends Controller {

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
        return view('admin.posts.index');
    }
 
    /**
     * get list of posts
     * @return json array
     */
    public function posts() { 
        $oPosts = Posts::orderBy('post_id', 'desc')->get();
        $aPosts = array();
        $i = 0;
        foreach ($oPosts as $oPost) { 
            $aPosts[$i] = $oPost->toArray(); 
            $aPosts[$i]['user'] = $oPost->user->name;   
            $i++;
        }
        return $aPosts;
    } 
     
}
