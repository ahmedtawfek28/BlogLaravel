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
                             <li class="breadcrumb-item"> <button type="button" class="btn btn-block btn-info">{{$posts->count()}}</button> 
               </li>
                        </ol>
                    </div>
                    <div class="col-md-1 align-self-center text-right d-none d-md-block">
                        <a class="btn btn-info" href="{{ route('author.post.create') }}">
                            <i class="fa fa-plus-circle"></i> 
                            <span>Create New</span>
                        </a>   
                        {{-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle"></i> Create New</button> --}}
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered">
                                    
<thead>
		<tr>
				<th>S.No</th>
				<th>Title</th>
                <th>Author</th>
                <th><i class="fa fa-eye"></i></th> 
                <th>Is Aproved</th>   
                <th>Status</th>
				<th>created_AT</th>
				<th>Action</th>
		</tr>
		
</thead>

<tbody> 

		@foreach($posts as $Post)
				<tr><td>{{ $loop->index + 1 }}</td>
						<td>{{$Post->title}}</td>
                         <td>{{$Post->user->name}}</td>
                         <td>{{$Post->view_count}}</td>
                         <td>  
                              @if($Post->is_approved==true) 
                     <span class="label label-success">Aproved</span>
                       @else 
                         <span class="label label-danger">Not_Aproved</span>
                     
                        @endif
                    </td>
                    <td>  
                     @if($Post->status==true) 
                   <span class="label label-success">Publish</span>
                     @else 
                       <span class="label label-danger">Not_Publish</span>
                   
                      @endif
                  </td>
				        <td>{{$Post->updated_at}}</td>
						<td>

                                <a href="{{ route('author.post.show',$Post->id) }}" class="btn btn-success waves-effect">
                                        <i class="fa fa-eye"></i>
                                    </a>
							<a href="{{ route('author.post.edit',$Post->id) }}" class="btn btn-info waves-effect">
                                <i class="fa fa-edit"></i>
                            </a>
								
								<button class="btn btn-danger" data-myid={{$Post->id}} data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></button>
						</td>
				</tr>

@endforeach
		
</tbody>
<tfoot>
		<tr>
                <th>S.No</th>
				<th>Title</th>
                <th>Author</th>
                <th><i class="fa fa-eye"></i></th> 
                <th>Is Aproved</th>   
                <th>Status</th>
				<th>created_AT</th>
				<th>Action</th>
		</tr>
	</tfoot>
</table>
</div>
</div>
</div>
</div>
</div>
@endsection
@section('model')
@include('author.post.model')
@endsection
@section('ajax')
@include('author.post.ajax')
@endsection