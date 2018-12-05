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
                        <h3 class="text-themecolor">Datatable</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Subscribers</li>
                        </ol>
                    </div>
                    <div class="col-md-7 align-self-center text-right d-none d-md-block">
                            
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle"></i> Create New</button>
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
				<th>email</th>
				<th>created_AT</th>
				<th>Action</th>
		</tr>
		
</thead>

<tbody> 

		@foreach($subscribers as $Subscriber)
				<tr><td>{{ $loop->index + 1 }}</td>
						<td>{{$Subscriber->email}}</td>
			         	<td>{{$Subscriber->updated_at}}</td>
						<td>
								<button class="btn btn-info" data-myemail="{{$Subscriber->email}}" data-myid={{$Subscriber->id}} data-toggle="modal" data-target="#edit">Edit</button>
								
								<button class="btn btn-danger" data-myid={{$Subscriber->id}} data-toggle="modal" data-target="#delete">Delete</button>
						</td>
				</tr>

@endforeach
		
</tbody>
<tfoot>
		<tr>
						<th>S.No</th>
				<th>Emails</th>
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
@include('admin.subscriber.model')
@endsection
@section('ajax')
@include('admin.subscriber.ajax')
@endsection