<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ArticlePostRequest;
use App\Posts; 


class PostsController extends Controller {
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {  
        $posts = \Auth::user()->posts()->paginate(10);  
        return view('posts.index', compact('posts'));
    }
    
    
   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('posts.add');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $aValidatedData = $request->validate(Posts::$rules); 
        
        $aValidatedData['user_id'] = \Auth::user()->id; 
        
        if($request->hasFile('attached_doc')){  
            $filename = time() . '-' .  request()->attached_doc->getClientOriginalName();
            Storage::put($filename, File::get(request()->attached_doc)) ? $filename : ''; 
            
            $aValidatedData['attached_doc'] = $filename;
        } 
        
        $post = Posts::create($aValidatedData); 
        
        $aData = array(
            'name' => \Auth::user()->name,
            'email' => \Auth::user()->email
        );
        \Mail::send('emails.post_notification', $aData, function($m) {
            $m->from(env('MAIL_FROM'), env('MAIL_NAME'));
            $m->to('kiran.ra.chandra@gmail.com')->subject('New Article Posted');
        });

        
        return redirect('/posts')->with('success', 'Post is successfully saved');
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::findOrFail($id);  
        
        if(\Auth::id() !== $post->user_id) { 
            return redirect('/home'); 
        }

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticlePostRequest $request, $id)
    {   
        $validator = Validator::make($request->all(), Posts::$rules);        
        if ($validator->fails()) { 
            return response()->json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()], 400); 
        }
         
        $aData = request()->except(['_token', '_method']);
        $post = Posts::where('post_id', $id)->update($aData); 
        
        session()->flash('success_message', 'Post is successfully updated');
        return response()->json(['success' => true, 'data' => Posts::find($id) ]);     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::findOrFail($id); 
        
        if ($post->attached_doc != ""){
            Storage::delete($post->attached_doc);
        }
                
        $post->delete();
        
        return \Response::json(['success' => true], 200); 
    }
    
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Posts::findOrFail($id);  
        return view('posts.show', compact('post'));
    }
    
    /**
     * show uploaded post image
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function getImage($id)
    {  
        $oPost = Posts::find($id); 
        return \Response::make(Storage::get($oPost->attached_doc), 200)
                    ->header("Content-Type", Storage::mimeType($oPost->attached_doc)); 
    }
  
}
