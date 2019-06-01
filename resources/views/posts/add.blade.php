@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('post.index') }}">{{ __('Posts') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('post.create') }}">Add New Post</a>
                        </li> 
                    </ul> 
                </div>

                <div class="card-body">
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                        </div><br />
                      @endif
                      
                      <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group">
                              <label for="title">Title:</label>
                              <input type="text" class="form-control" name="title"/>
                          </div>
                          <div class="form-group">
                              <label for="content">Content :</label>
                              <textarea class="form-control" name="content" rows="6"></textarea>
                          </div>
                          <div class="form-group">
                              <label for="attached_doc">Attachment :</label>
                              <input type="file" class="form-control" name="attached_doc"/>
                          </div>
                          <button type="submit" class="btn btn-primary">Save</button>
                      </form>
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

