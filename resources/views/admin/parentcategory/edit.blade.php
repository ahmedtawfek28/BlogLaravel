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
                    <h3 class="text-themecolor">ParentCategory </h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../dashboard">Home</a></li>
                            <li class="breadcrumb-item ">parentcategory</li>
                            <li class="breadcrumb-item active">Edit</li>
               {{-- <li class="breadcrumb-item"> <button type="button" class="btn btn-block btn-info">{{$parentcategories->count()}}</button>  --}}
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
          <h4 class="modal-title" id="myModalLabel">New parentcategory</h4>
        </div>
        <form action="{{ route('admin.parentcategory.update',$parentcategory->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Title_Ar,Title_En,Images</h4>
                                <div class="form-group">
                                    <label for="title_ar">Title_Ar</label>
                                    <input type="text" class="form-control" name="title_ar" id="title_ar" value="{{ $parentcategory->title_ar }}">
                                </div>
                                <div class="form-group">
                                    <label for="title_en">Title_en</label>
                                    <input type="text" class="form-control" name="title_en" id="title_en" value="{{ $parentcategory->title_en }}">
                                </div>
                                <div class="form-group">
                                
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="image" id="image" aria-describedby="fileHelp">
                                    </div>
                    
                            </div>
				<div class="details_ar">
                    <label for="details_ar">Details_Ar</label>
					<textarea id="mymce" name="details_ar" >{{ $parentcategory->details_ar }}</textarea>
					</div>
<br>
<br>
                    <div class="details_en">
                    <label for="details_en">Details_En</label>
					<textarea id="mymce" name="details_en" >{{ $parentcategory->details_en }}</textarea>
                    </div>
					</div>
                    </div>
					</div>
                  <div class="modal-footer">
                        <a href="{{ route('admin.parentcategory.index') }}" class="btn btn-danger waves-effect">BACK</a>
                   
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
            </div>
        </form>
      </div>

    </div>
    
@endsection
