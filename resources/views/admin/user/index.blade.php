@extends('layouts.admin')
@section('content')  
<div class="content-wrapper">        
    <section class="content-header"> 
        <ol class="breadcrumb">
            <li><a href="/dashboard"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Users</li>
        </ol>
    </section>        
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">List of Users</h3> 
            </div>
             
            <div class="box-body">
                <div class="table-responsive">
                    <table id="users" class="table table-bordered table-hover dataTable table-responsive">
                        <thead>
                            <tr> 
                                <th width="20%">Name</th>  
                                <th width="10%">Email</th>  
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
    var users_table = $('#users').DataTable( {
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]], 
        "iDisplayLength": 25,
        "bScrollCollapse": true,
        "bAutoWidth": true,
        "sScrollX": "100%",
        "sScrollXInner": "100%", 
        "ajax": {               
            "processing": true,
            "serverSide": true,
            "url": "/admin/users.list", 
            "dataSrc": "", 
        },
        "columns": [ 
            { "data": "name" },  
            { "data": "email" },  
        ]  
    });
          
});
</script> 
@endsection