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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Post</li>
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

            <div class="modal-body">
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"> {{ $post->title }}</h4>
                               
                                <small>Posted By <strong> <a href="">{{ $post->user->name }}</a></strong> on {{ $post->created_at->toFormattedDateString() }}</small>
                               
                                {!! $post->body !!}
                    
                
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <!-- column -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Categories</h4>
                                <div class="form-group">
                                 
                                    @foreach($post->categories as $category)
                                    <h3>       <span class="label label-success"><i class="fa fa-th-large"></i>&nbsp{{ $category->title }}</span></h3>
                                @endforeach
                                  
                                  </div>
                                <h4 class="card-title">Tags</h4>

                            <div class="form-group ">
                
                             
                                        <h4>    @foreach($post->tags as $tag)
                                            <span class="label label-info"><i class="fa  fa-tags"></i>&nbsp{{ $tag->title }}</span> 
                                    @endforeach
                                </h4>
                                </div>
                                <div class="form-group">
                                
                                    <label>Image</label>
                                    <img class="img-responsive thumbnail" src="{{ Storage::disk('public')->url('post/'.$post->image) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                </div>
                  <div class="modal-footer">
                        @if($post->is_approved == true)
                        <button type="button" class="btn btn-success waves-effect pull-right">
                            <i class="fa fa-check"></i> 
                            <span>Approved</span>
                        </button>
                       
                    @else
                        <button type="button" class="btn btn-danger pull-right" disabled>
                            <i class="ti-close"> </i>
                            <span>Approved</span>
                        </button>
                    @endif
                        <a href="{{ route('author.post.index') }}" class="btn btn-danger waves-effect">BACK</a>
                  </div>
            </div>
  
      </div>

    </div>
    
@endsection
