<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Intervention\Image\Facades\Image;
// use Intervention\Image\Image;

class CategoryController extends Controller
{


    public function __construct(){

        $this->middleware('permission:view-category',['only' => ['index']]);
        $this->middleware('permission:create-category',['only' => ['create','store']]);
        $this->middleware('permission:update-category',['only' => ['edit','update']]);
        $this->middleware('permission:delete-category',['only' => ['destroy']]);
     
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('backend.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
     
        $result = Category::create($this->validateRequest());


        if($result)
        {
            return back()->with('success','Category Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.category.create',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // dd($request->file());    

        $request->validate([
            'name' => $request->name == $category->name ? '':'required|unique:categories,name',
            'image' => 'mimes:jpeg,png,gif',

        ]);
        
        if($request->hasfile('image'))
        {
            $name = $this->uploadImage($request->image);

            $this->deleteImage($category->image);
        
        }
         if($request->status)
           
           {
                $status = 1;
           }

           else
           {
            $status = 0;
           }


           $category->name = $request->name;
           $category->image = $name ?? $category->image;
           $category->status = $status;

        $result = $category->update();

        if($result)
        {
            return back()->with('success','Category updated Successfully');
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $this->deleteImage($category->image);
        
        if($category->delete())
        {
            return back()->with('success','Category Deleted Successfully');
        }
    }


    public function uploadImage($image)
    {

        // $img = Image::make($image)->resize(300, 200)->save();
        $ext = $image->getClientOriginalExtension();
        $name = time().'.'.$ext;
        $image->move(public_path('images/category'),$name);

        return $name;
        
    }

    public function deleteImage($name)
    {
        $file_path = public_path().'/images/category/'.$name;
       
        unlink($file_path);
    }

    public function validateRequest($category = null)
    {

           $attr  = request()->validate([
            'name' => 'required|unique:categories,name',
            'image' =>  'required|mimes:jpeg,png,gif',
        ]);

           $image = $this->uploadImage(request()->image);


            if(request()->status)
           
           {
                $status = 1;
           }

           else
           {
            $status = 0;
           }
           
           $attr = ['image' => $image, 'status' => $status,'name' => request()->name,'slug' => str_slug(request()->name)];

           return $attr;
    }
}
