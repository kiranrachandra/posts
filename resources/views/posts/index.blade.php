@extends('layouts.app') 
@section('content') 

<link rel="stylesheet" href="{{ asset("js/colorbox/colorbox.css")}}" /> 
<script src="{{ asset("js/colorbox/jquery.colorbox.js")}}" defer></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">  
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('post.index') }}">{{ __('Posts') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('post.create') }}">Add New Post</a>
                        </li> 
                    </ul> 
                </div>

                <div class="card-body">   
                    
                    @if(session()->get('success'))
                      <div class="alert alert-success">
                        {{ session()->get('success') }}  
                      </div><br />
                    @endif
                    
                    <table class="table table-striped">
                      <thead>
                          <tr> 
                            <th width="15%">Date</th>
                            <th width="20%">Title</th>
                            <th width="40%">Content</th>
                            <th width="10%">Attachment</th>
                            <th width="15%"colspan="3">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($posts as $post)
                          <tr id="{{ $post->post_id }}">
                              <td>{{ $post->created_at }}</td>
                              <td id="title_{{ $post->post_id }}">{{ $post->title }}</td>
                              <td id="content_{{ $post->post_id }}">{{ $post->content }}</td>
                              <td>
                                  
                                @if ($post->attached_doc != "")
                                    <a href="{{ route('post.image', ['id' => $post->post_id]) }}" class="iframe">Attachment</a> 
                                @endif

                              </td>
                              <td>
                                  <a href="/posts/{{ $post->post_id }}/edit" class="btn btn-xs btn-primary iframe">Edit</a>
                              </td>
                              <td>
                                  <a href="{{ route('post.show', ['id' => $post->post_id]) }}" class="btn btn-xs btn-dark">Show</a> 
                              </td>
                              <td>
                                  <span data-id="{{ $post->post_id }}" class="btn btn-xs btn-danger deletePost">Delete</span> 
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                    
                    Records {{ $posts->firstItem() }} - {{ $posts->lastItem() }} of {{ $posts->total() }} (for page {{ $posts->currentPage()  }} )
                    {{ $posts->links() }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
  
<script> 
$(document).ready(function() {     
    $(".iframe").colorbox({iframe: true, width: "90%", height: "96%", onClosed: function () { }});   
    
    $(".deletePost").on('click', function(){ 
        
        if(confirm('Are you sure to delete?')){
            let id = $(this).attr("data-id");
            let token = $("meta[name='csrf-token']").attr("content"); 
            $.ajax({
                url: "/posts/"+id,  
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function (){ 
                    console.log(); 
                }
            });

            $(this).closest('tr').remove();
        }
 
    });
     
});
</script> 
@endsection