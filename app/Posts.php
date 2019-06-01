<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model 
{
    use SoftDeletes;
 
    protected $table = 'posts';
    public $primaryKey = 'post_id';
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'user_id', 'attached_doc'
    ];
  
    public static $rules = array(
        'title' => 'required|max:255',
        'content' => 'required',
        'attached_doc' => 'image|mimes:jpeg,png,jpg|max:2048',
    );
    
    /**
     * 
     *  
    * Get the user that owns the post.
    */ 
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id'); 
    }
     
     
}
