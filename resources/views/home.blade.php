@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-success" role="alert">
                You are logged in!
            </div>
            
            <div class="card">
                <div class="card-header">Posts</div> 
                <div class="card-body"> 
                     
                    <a href="/posts" class="btn btn-primary" > View Posts</a>
                    
                    <a href="/post/create" class="btn btn-primary"> Add New Post</a>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
