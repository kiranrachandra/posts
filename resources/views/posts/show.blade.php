@extends('layouts.app') 
@section('content') 

<link rel="stylesheet" href="{{ asset("js/colorbox/colorbox.css")}}" /> 
<script src="{{ asset("js/colorbox/jquery.colorbox.js")}}" defer></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card"> 
                
                <div class="card-header">Show Post </div>

                <div class="card-body">   
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Title:</strong>
                                {{ $post->title }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Content:</strong>
                                {{ $post->content }}
                            </div>
                        </div>

                        <pre>




                        </pre>
                        <div class="col-xs-12 col-sm-12 col-md-12 pull-left">  
                            <a href="/posts" class="btn btn-primary" > View more Posts</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  
<script> 
$(document).ready(function() {     
     
});
</script> 
@endsection