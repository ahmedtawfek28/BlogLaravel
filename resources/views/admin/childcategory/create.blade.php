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
                            <li class="breadcrumb-item"><a href="../dashboard">Home</a></li>
                            <li class="breadcrumb-item active">childcategory</li>
                            <li class="breadcrumb-item active">Create</li>
               {{-- <li class="breadcrumb-item"> <button type="button" class="btn btn-block btn-info">{{$childcategories->count()}}</button>  --}}
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
          <h4 class="modal-title" id="myModalLabel">New childcategory</h4>
        </div>
        <form action="{{ route('admin.childcategory.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Title_Ar,Title_En,Images,Parent Category</h4>
                                <div class="form-group">
                                    <label for="title_ar">Title_Ar</label>
                                    <input type="text" class="form-control" name="title_ar" id="title_ar">
                                </div>
                                <div class="form-group">
                                    <label for="title_en">Title_en</label>
                                    <input type="text" class="form-control" name="title_en" id="title_en">
                                </div>
                                <div class="form-group">
                                
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="image" id="image" aria-describedby="fileHelp">
                                    </div>
                                    <div class="form-group {{ $errors->has('parentcategories') ? 'focused error' : '' }}">
                                    <label for="Multi-Select">ParentCategories</label>
              
                                    <select name="parentcategories" id="parentcategory" class="select2 m-b-10 " style="width: 100%" >
                                          @foreach($parentcategories as $ParentCategory)
                                         <option value="{{$ParentCategory->id}}">{{$ParentCategory->title_en}}</option>
                                          @endforeach
                                          
                                      </select>
                                  </div>
                            </div> 
				<div class="details_ar">
                    <label for="details_ar">Details_Ar</label>
					<textarea id="mymce" name="details_ar"></textarea>
					</div>
<br>
<br>
                    <div class="details_en">
                    <label for="details_en">Details_En</label>
					<textarea id="mymce" name="details_en"></textarea>
                    </div>
					</div>
                    </div>
					</div>
                  <div class="modal-footer">
                        <a href="{{ route('admin.childcategory.index') }}" class="btn btn-danger waves-effect">BACK</a>
                  
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
            </div>
        </form>
      </div>

    </div>
    
@endsection
