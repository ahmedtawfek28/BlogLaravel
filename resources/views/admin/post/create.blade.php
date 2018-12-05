@extends('layouts.master')

@section('content')

       <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Posts </h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Post</li>
                            <li class="breadcrumb-item active">Create</li>
               {{-- <li class="breadcrumb-item"> <button type="button" class="btn btn-block btn-info">{{$posts->count()}}</button>  --}}
               </li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
      <div class=" modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">New Post</h4>
        </div>
        <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Title,Images,publish</h4>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" id="title">
                                </div>
                                <div class="form-group">
                                
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="image" id="image" aria-describedby="fileHelp">
                                    </div>
                    
                                    <div class="form-group">
                                            <input type="checkbox" id="publish" class="filled-in" name="status" value="1">
                                            <label for="publish">Publish</label>
                                        </div>
                
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <!-- column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Categories & Tags</h4>
                                <div class="form-group {{ $errors->has('categories') ? 'focused error' : '' }}">
                                    <label for="Multi-Select">Categories</label>
              
                                    <select name="categories" id="category" class="select2 m-b-10 " style="width: 100%" >
                                          @foreach($categories as $Category)
                                         <option value="{{$Category->id}}">{{$Category->title}}</option>
                                          @endforeach
                                          
                                      </select>
                                  </div>
                            <div class="form-group {{ $errors->has('tags') ? 'focused error' : '' }}">
                                  <label for="Multi-Select">Tags</label>
            
                                  <select name="tags[]" id="tag" class="select2 m-b-10 select2-multiple select2-hidden-accessible" style="width: 100%" multiple="" data-placeholder="Choose" tabindex="-1" aria-hidden="true">
                                        @foreach($tags as $Tag)
                                        <option value="{{ $Tag->id }}">{{ $Tag->title }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                </div>
				
				{{-- <div class="col-md-6 form-group">
		        	<label for="title">Title</label>
		        	<input type="text" class="form-control" name="title" id="title">
				</div>
				<div class="col-md-6 form-group">
				
						<label>Image</label>
						<input type="file" class="form-control" name="image" id="image" aria-describedby="fileHelp">
					</div>
	
					<div class="form-group">
							<input type="checkbox" id="publish" class="filled-in" name="status" value="1">
							<label for="publish">Publish</label>
						</div>

				<div class="form-group {{ $errors->has('categories') ? 'focused error' : '' }}">
						<label for="Multi-Select">Categories</label>
  
						<select name="categories[]" id="category" class="select2 m-b-10 select2-multiple select2-hidden-accessible" style="width: 100%" multiple="" data-placeholder="Choose" tabindex="-1" aria-hidden="true">
							  @foreach($categories as $Category)
						     <option value="{{$Category->id}}">{{$Category->title}}</option>
							  @endforeach
							  
						  </select>
					  </div>
				<div class="form-group {{ $errors->has('tags') ? 'focused error' : '' }}">
			      	<label for="Multi-Select">Tags</label>

					  <select name="tags[]" id="tag" class="select2 m-b-10 select2-multiple select2-hidden-accessible" style="width: 100%" multiple="" data-placeholder="Choose" tabindex="-1" aria-hidden="true">
							@foreach($tags as $Tag)
							<option value="{{ $Tag->id }}">{{ $Tag->title }}</option>
							@endforeach
							
						</select>
					</div> --}}
				<div class="body">
					<textarea id="mymce" name="body"></textarea>
					</div>
                  <div class="modal-footer">
                        <a href="{{ route('admin.post.index') }}" class="btn btn-danger waves-effect">BACK</a>
                  
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
            </div>
        </form>
      </div>

    </div>
    
@endsection
