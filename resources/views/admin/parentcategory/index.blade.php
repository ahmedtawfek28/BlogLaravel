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
                    <h3 class="text-themecolor">ParentCategories </h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">ParentCategory</li>
                             <li class="breadcrumb-item"> <button type="button" class="btn btn-block btn-info">{{$parentcategories->count()}}</button> 
               </li>
                        </ol>
                    </div>
                    <div class="col-md-1 align-self-center text-right d-none d-md-block">
                        <a class="btn btn-info" href="{{ route('admin.parentcategory.create') }}">
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
				<th>Title_ar</th>
                <th>Title_en</th>
                <th>Slug</th>
				<th>created_AT</th>
				<th>Action</th>
		</tr>
		
</thead>

<tbody> 

		@foreach($parentcategories as $parentcategory)
				<tr><td>{{ $loop->index + 1 }}</td>
						<td>{{$parentcategory->title_ar}}</td>
                         <td>{{$parentcategory->title_en}}</td>
                         <td>{{$parentcategory->slug}}</td>
                        
				        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $parentcategory->updated_at)->diffForHumans() }}</td>
                <td>


                                    <button class="btn btn-success waves-effect" data-mytitle_ar="{{$parentcategory->title_ar}}"data-mytitle_en="{{$parentcategory->title_en}}"data-myimage="{{$parentcategory->image}}"data-mydetails_ar="{!!$parentcategory->details_ar!!}"data-mydetails_en="{!!$parentcategory->details_en!!}"data-myid={{$parentcategory->id}} data-toggle="modal" data-target="#show">  <i class="fa fa-eye"></i></button>
							<a href="{{ route('admin.parentcategory.edit',$parentcategory->id) }}" class="btn btn-info waves-effect">
                                <i class="fa fa-edit"></i>
                            </a>
								
								<button class="btn btn-danger" data-myid={{$parentcategory->id}} data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></button>
						</td>
				</tr>

@endforeach
		
</tbody>
<tfoot>
		<tr>
               <th>S.No</th>
				<th>Title_ar</th>
                <th>Title_en</th>
                <th>Slug</th>
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
@include('admin.parentcategory.model')
@endsection
@section('ajax')
@include('admin.parentcategory.ajax')
@endsection