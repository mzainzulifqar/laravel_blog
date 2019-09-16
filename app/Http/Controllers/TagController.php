<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function __construct(){
        $this->middleware('permission:view-tag',['only' => ['index']]);
        $this->middleware('permission:create-tag',['only' => ['create','store']]);
        $this->middleware('permission:edit-tag',['only' => ['edit','update']]);
        $this->middleware('permission:delete-tag',['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = $this->fetchTags();
        return view('backend.tag.index',compact('tags'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(str_slug($request->name));

        $attr = $this->validateRequest();
        $attr['slug'] = str_slug($attr['name']);

       $result =  Tag::create($attr);
       
       if($result)
       {
              return back()->with('success','Tag Created Successfully'); 
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('backend.tag.create',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $attr = $this->validateRequest($tag);
        $attr['slug'] = str_slug($attr['name']);

        $tag->name = $attr['name'];
        $tag->slug = $attr['slug'];
        $result = $tag->update();

        if($result)
        {
            return back()->with('success','Tag Updated Successfully');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if($tag->delete())
        {
            return back()->with('success','Tag Deleted Successfully');
        }
    }

    /**
     * Fetch all the tags.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function fetchTags()
    {
        return Tag::paginate(10);
    }

    public function validateRequest($tag = null)
    {
        if(isset($tag) && request()->name == $tag->name)
        {
            $val  = '';
        }
        else
        {
            $val = 'required|unique:tags,name';
        }

        return request()->validate([
            'name' => $val,

        ]);
    }
}
