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
use App\ParentCategory;

class ParentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parentcategories = ParentCategory::latest()->get();
        return view('admin.parentcategory.index',compact('parentcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.parentcategory.create');
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

            if(!Storage::disk('public')->exists('parentcategory'))
            {
                Storage::disk('public')->makeDirectory('parentcategory');
            }
          
            $parentcategoryImage = Image::make($image)->resize(1600,1066)->save('test.jpg');
            Storage::disk('public')->put('parentcategory/'.$imageName,$parentcategoryImage);

        } else {
            $imageName = "default.png";
        }
        $parentcategory = new ParentCategory();
        $parentcategory->title_ar = $request->title_ar;
        $parentcategory->title_en = $request->title_en;
        $parentcategory->slug = $slug;
        $parentcategory->image = $imageName;
        $parentcategory->details_ar = $request->details_ar;
        $parentcategory->details_en = $request->details_en;
        
        $parentcategory->save();

        Toastr::success('parentcategory Successfully Saved :)','Success');
        return redirect()->route('admin.parentcategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\parentcategory  $parentcategory
     * @return \Illuminate\Http\Response
     */
    public function show(ParentCategory $parentcategory)
    {
        $parentcategory = ParentCategory::find($parentcategory);
        return view('admin.parentcategory.show',compact('parentcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ParentCategory  $parentcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ParentCategory $parentcategory)
    {
        return view('admin.parentcategory.edit',compact('parentcategory')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\parentcategory  $parentcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParentCategory $parentcategory)
    {
        $this->validate($request,[
            'title_ar' => 'required',
            'title_en' => 'required',
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

            if(!Storage::disk('public')->exists('parentcategory'))
            {
                Storage::disk('public')->makeDirectory('parentcategory');
            }

        // delete old post image
        if(Storage::disk('public')->exists('parentcategory/'.$parentcategory->image))
        {
            Storage::disk('public')->delete('parentcategory/'.$parentcategory->image);
        }
            $parentcategoryImage = Image::make($image)->resize(1600,1066)->save('test.jpg');
            Storage::disk('public')->put('parentcategory/'.$imageName,$parentcategoryImage);

        } else {
            $imageName = $parentcategory->image;
        }
        $parentcategory->title_ar = $request->title_ar;
        $parentcategory->title_en = $request->title_en;
        $parentcategory->slug = $slug;
        $parentcategory->image = $imageName;
        $parentcategory->details_ar = $request->details_ar;
        $parentcategory->details_en = $request->details_en;
        
        $parentcategory->save();

        Toastr::success('parentcategory Successfully Updated :)','Success');
        return redirect()->route('admin.parentcategory.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ParentCategory  $parentcategory
     * @return \Illuminate\Http\Response
     */
   public function destroy(Request $request)
    {    
        $parentcategory = ParentCategory::findOrFail($request->parentcategory_id);

        if (Storage::disk('public')->exists('parentcategory/'.$parentcategory->image))
        {
            Storage::disk('public')->delete('parentcategory/'.$parentcategory->image);
        }
        $parentcategory->delete();
        Toastr::success('ParentCategory Successfully Deleted :)','Success');
        return redirect()->back();
    }



}
