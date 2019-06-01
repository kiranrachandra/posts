@extends('layouts.iframe')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card"> 
                
                <div class="card-header">Edit Post </div>

                <div class="card-body">
                    
                    <div class="alert alert-danger" style='display: none;'></div> 
                                            
                    <form id="edit_post" action="{{ route('post.update', ['id' => $post->post_id]) }}" method="POST" enctype="multipart/form-data"> 
                        
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group"> 
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title" value="{{ $post->title }}" />
                        </div>
                        <div class="form-group">
                            <label for="content">Content :</label>
                            <textarea class="form-control" name="content" rows="6" >{{ $post->content }}</textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Update </button>
                        
                    </form>
                       
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/js/jquery.validate.min.js" defer></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.alert-danger').html("").hide();    

        $("#edit_post").validate({
            rules: { },
            errorPlacement: function () {
                return false;
            },
            submitHandler: function (form) {  
                var frm = $("#edit_post"); 

                $.ajax({
                    method: "PUT",
                    url: frm.attr('action'),
                    data: frm.serialize(),
                    dataType: "json"
                })
                .done(function (response) {  
                    $('.alert-danger').html("").hide(); 
            
                    parent.$("#title_"+response.data.post_id).html(response.data.title);
                    parent.$("#content_"+response.data.post_id).html(response.data.content);                    
                    parent.$.colorbox.close(); 
 
                })
                .fail(function (data) {  
                    var error_out = "";
                    $.each(data.responseJSON.errors, function (key, value) {
                        error_out += "<i class='fa fa-times-circle fa-fw fa-lg'></i><strong>"+value+"</strong><br/>"; 
                    });                            
                    $('.alert-danger').html(error_out).show();
                });
            }
        });

    });
</script>
@endsection
 