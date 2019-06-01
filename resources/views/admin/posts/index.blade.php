@extends('layouts.admin')
@section('content')  
<div class="content-wrapper">        
    <section class="content-header"> 
        <ol class="breadcrumb">
            <li><a href="/dashboard"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Posts</li>
        </ol>
    </section>        
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">List of Posts</h3> 
            </div>
             
            <div class="box-body">
                <div class="table-responsive">
                    <table id="posts" class="table table-bordered table-hover dataTable table-responsive">
                        <thead>
                            <tr> 
                                <th width="20%">Date</th>  
                                <th width="10%">Title</th> 
                                <th width="30%">Content</th>  
                                <th width="8%">Attachment</th>   
                                <th width="10%">User</th>   
                                <th width="10%"></th>
                            </tr>
                        </thead> 
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<script> 
$(document).ready(function() {     
    var posts_table = $('#posts').DataTable( {
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]], 
        "iDisplayLength": 25,
        "bScrollCollapse": true,
        "bAutoWidth": true,
        "sScrollX": "100%",
        "sScrollXInner": "100%",
        "order": [[5, 'desc']], 
        "ajax": {               
            "processing": true,
            "serverSide": true,
            "url": "/admin/posts.list", 
            "dataSrc": "", 
        },
        "columns": [ 
            { "data": "created_at" },  
            { "data": "title",
                "render": function(data, type, row, meta) {   
                    return '<span id="title_'+row.post_id+'">'+row.title+'</span>'; 
                }
            },   
            { "data": "content",
                "render": function(data, type, row, meta) {   
                    return '<span id="content_'+row.post_id+'">'+row.content+'</span>'; 
                }
            },  
            { "data": "user", 
                "render": function(data, type, row, meta) {   
                    var out = "";
                    if(row.attached_doc!==null){
                        out+='<a href="/post/'+row.post_id+'" class="iframe">Attachment</a>'; 
                    }                        
                    return out;
                }
            },    
            { "data": "user" },     
            { "data": "post_id",
                "render": function(data, type, row, meta) {     
                    var out='<div>';                     
                    out+='<span data-id="' + row.post_id + '" class="btn btn-danger btn-xs deletePost"><i class="fa fa-times"></i> Delete</span>';                            
                    out+='<span class="btn btn-xs btn-warning iframe" href="/posts/' + row.post_id + '/edit" style="margin-top:4px;cursor:pointer;"><i class="fa fa-pencil"></i> Edit</span>  ';   
                    out+='</div>';                         
                    return out;
                }
            }, 
        ],  
        "initComplete": function(settings, json) {
            $(".iframe").colorbox({iframe: true, width: "90%", height: "96%", onClosed: function () { }});
        },
        "fnDrawCallback": function () { 
            $(".iframe").colorbox({iframe: true, width: "90%", height: "96%", onClosed: function () { }});
        }
    });
    
    $(document).on('click', '.deletePost', function(e){  
        if(confirm('Are you sure to delete ?')){
            var id = $(this).attr("data-id");
            var token = $("meta[name='csrf-token']").attr("content");  
            $.ajax({
                url: "/posts/"+id,
                type: 'PATCH',
                data: { 
                    "_token": token,
                },
                success: function (){ 
                    console.log(); 
                }
            });        
            $(this).closest('tr').remove(); 
        }
    });
    
    $(".iframe").colorbox({iframe: true, width: "90%", height: "96%", onClosed: function () { }});
     
    
});
</script> 
@endsection