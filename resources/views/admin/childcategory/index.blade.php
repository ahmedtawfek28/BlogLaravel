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
                    <h3 class="text-themecolor">childcategories </h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">childcategory</li>
                             <li class="breadcrumb-item"> <button type="button" class="btn btn-block btn-info">{{$childcategories->count()}}</button> 
               </li>
                        </ol>
                    </div>
                    <div class="col-md-1 align-self-center text-right d-none d-md-block">
                        <a class="btn btn-info" href="{{ route('admin.childcategory.create') }}">
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

		@foreach($childcategories as $childcategory)
				<tr><td>{{ $loop->index + 1 }}</td>
						<td>{{$childcategory->title_ar}}</td>
                         <td>{{$childcategory->title_en}}</td>
                         <td>{{$childcategory->slug}}</td>
                        
				        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $childcategory->updated_at)->diffForHumans() }}</td>
                <td>


                                    <button class="btn btn-success waves-effect"data-myptitle_ar="{{$childcategory->parent_category->title_ar}}" data-myptitle_en="{{$childcategory->parent_category->title_en}}"data-mytitle_ar="{{$childcategory->title_ar}}"data-mytitle_en="{{$childcategory->title_en}}"data-myimage="{{$childcategory->image}}"data-mydetails_ar="{!!$childcategory->details_ar!!}"data-mydetails_en="{!!$childcategory->details_en!!}"data-myid={{$childcategory->id}} data-toggle="modal" data-target="#show">  <i class="fa fa-eye"></i></button>
							<a href="{{ route('admin.childcategory.edit',$childcategory->id) }}" class="btn btn-info waves-effect">
                                <i class="fa fa-edit"></i>
                            </a>
								
								<button class="btn btn-danger" data-myid={{$childcategory->id}} data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></button>
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
@include('admin.childcategory.model')
@endsection
@section('ajax')
@include('admin.childcategory.ajax')
@endsection