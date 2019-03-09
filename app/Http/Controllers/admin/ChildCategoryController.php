<?php

namespace App\Http\Controllers\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\ChildCategory;
use App\ParentCategory;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $childcategories = ChildCategory::latest()->get();
        return view('admin.childcategory.index',compact('childcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentcategories = ParentCategory::all();
        return view('admin.childcategory.create',compact('parentcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        $this->validate($request,[
            'title_ar' => 'required',
            'title_en' => 'required',
            'parentcategories' => 'required',
            'image' => 'required',
            'details_ar' => 'required',
            'details_en' => 'required',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title_en);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('childcategory'))
            {
                Storage::disk('public')->makeDirectory('childcategory');
            }
          
            $childcategoryImage = Image::make($image)->resize(1600,1066)->save('test.jpg');
            Storage::disk('public')->put('childcategory/'.$imageName,$childcategoryImage);

        } else {
            $imageName = "default.png";
        }
        $childcategory = new ChildCategory();
        $childcategory->title_ar = $request->title_ar;
        $childcategory->title_en = $request->title_en;
        $childcategory->slug = $slug;
        $childcategory->image = $imageName;
        $childcategory->details_ar = $request->details_ar;
        $childcategory->details_en = $request->details_en;
        $childcategory->parent_category_id = $request->parentcategories;
        $childcategory->save();

        Toastr::success('childcategory Successfully Saved :)','Success');
        return redirect()->route('admin.childcategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ChildCategory  $childcategory
     * @return \Illuminate\Http\Response
     */
    public function show(ChildCategory $childcategory)
    {
    
         $childcategory = ChildCategory::find($childcategory);
        return view('admin.childcategory.show',compact('childcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ChildCategory  $childcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ChildCategory $childcategory)
    {
        $parentcategories = ParentCategory::all();
        return view('admin.childcategory.edit',compact('childcategory','parentcategories')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ChildCategory  $childcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChildCategory $childcategory)
    {
        $this->validate($request,[
            'title_ar' => 'required',
            'title_en' => 'required',
            'parentcategories' => 'required',
            'image' => 'image',
            'details_ar' => 'required',
            'details_en' => 'required',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title_en);
        if(isset($image))
        {
             // make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('childcategory'))
            {
                Storage::disk('public')->makeDirectory('childcategory');
            }

        // delete old post image
        if(Storage::disk('public')->exists('childcategory/'.$childcategory->image))
        {
            Storage::disk('public')->delete('childcategory/'.$childcategory->image);
        }
            $childcategoryImage = Image::make($image)->resize(1600,1066)->save('test.jpg');
            Storage::disk('public')->put('childcategory/'.$imageName,$childcategoryImage);

        } else {
            $imageName = $childcategory->image;
        }
        $childcategory->title_ar = $request->title_ar;
        $childcategory->title_en = $request->title_en;
        $childcategory->slug = $slug;
        $childcategory->image = $imageName;
        $childcategory->parent_category_id = $request->parentcategories;
        $childcategory->details_ar = $request->details_ar;
        $childcategory->details_en = $request->details_en;
        
        $childcategory->save();

        Toastr::success('childcategory Successfully Updated :)','Success');
        return redirect()->route('admin.childcategory.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ChildCategory  $childcategory
     * @return \Illuminate\Http\Response
     */
   public function destroy(Request $request)
    {    
        $childcategory = ChildCategory::findOrFail($request->childcategory_id);

        if (Storage::disk('public')->exists('childcategory/'.$childcategory->image))
        {
            Storage::disk('public')->delete('childcategory/'.$childcategory->image);
        }
        $childcategory->delete();
        Toastr::success('childcategory Successfully Deleted :)','Success');
        return redirect()->back();
    }



}
