<?php

namespace App\Http\Controllers;

use App\Category;
use App\Notifications\PostApproved;
use App\Notifications\PostNotification;
use App\Notifications\SubscriberNotification;
use App\Post;
use App\Subscriber;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{

    public function __construct(){

        $this->middleware('permission:view-post',['only' => ['index']]);
        $this->middleware('permission:create-post',['only' => ['create','store']]);
        $this->middleware('permission:update-post',['only' => ['edit','update']]);
        $this->middleware('permission:delete-post',['only' => ['destroy']]);
        $this->middleware('permission:approve-post',['only' => ['approved']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isSuperAdmin())
        {
         $posts = Post::latest()->paginate(10);
        }
        else 
        {
          $posts = Post::where('user_id',Auth::id())->paginate(10);   
        }
        return view('backend.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $category = Category::where('status' ,'=',1)->get();
        return view('backend.post.create',compact('tags','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $post = Post::create($this->validateRequest());
       $post->tags()->attach($request->tags);
       $post->category()->attach($request->category);
       if($post) 
       {
                $admin = User::find(1);  //sending notification to admin
                $admin->notify(new PostNotification($post));
                $subcribers = Subscriber::all();
                foreach($subcribers as $subscriber)
                {
                
                   Notification::route('mail',$subscriber->email)->notify(new SubscriberNotification($post));
            }
                return back()->with('success','Post has been created');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $tags = Tag::all();
        $category = Category::where('status' ,'=',1)->get();
        return view('backend.post.view',compact('tags','category','post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if($post->user_id == Auth::user()->id || Auth::user()->isSuperAdmin())
         {   
        $tags = Tag::all();
        $category = Category::where('status' ,'=',1)->get();
        return view('backend.post.create',compact('tags','category','post'));
        }
        else
        {
            return back()->with('success','Whoops! Not so clever!!!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // dd($request->all());

          $request->validate([
            'title' => $request->title == $post->title ? '' : 'required|max:120|unique:posts,title',
            'image' => $request->hasFile('image') ? 'required|mimes:jpeg,jpg,png' : '',
            'category' => 'required',
            'tags' => 'required',
            'body' => 'required',
            'featured_description' => 'required|max:100',



         ]);

         if(request()->hasFile('image'))
         {
            $ext = request()->image->getClientOriginalExtension();
            $name = time().'.'.$ext;
            request()->image->move(public_path('images/posts'),$name);
            $this->deleteImage($post->images);
         }

         if(request()->status)
         {
            $status = 'active';
         }
         else
         {
            $status  = 'pending';
         }

         $post->title = $request->title;
         $post->slug = str_slug($request->title);
         $post->body = $request->body;
         $post->images = $name ?? $post->images;
         $post->user_id = Auth::id();
         $post->status = $status;
         $post->featured_description = $request->featured_description;
         $result = $post->update();

         $post->tags()->detach();
         $post->category()->detach();

         if($result)
         {
            $post->tags()->attach($request->tags);
            $post->category()->attach($request->category);
            return back()->with('success','Post has been updated Successfully');
         }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
         if($post->user_id == Auth::user()->id || Auth::user()->isSuperAdmin())
         {
            if($post->delete() && $post->tags()->detach() && $post->category()->detach())
            {
                return back()->with('success','Post has been deleted');
            }
        }
        else
        {
            return back()->with('success','Whoops!,Not so clever');
        }
    }


    public function uploadImage(Request $request){

        $CKEditor = $request->input('CKEditor');
    $funcNum  = $request->input('CKEditorFuncNum');
    $message  = $url = '';
    if (Input::hasFile('upload')) {
        $file = Input::file('upload');
        if ($file->isValid()) {
            $filename =time().$file->getClientOriginalName();
            $file->move(public_path('images\posts'), $filename);
            $url = url(asset('public/images/posts') .'/'. $filename);
        } 
        else {
            $message = 'An error occurred while uploading the file.';
        }
    } else {
        $message = 'No file uploaded.';
    }
    return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
}

    public function validateRequest(){

        $attr =  request()->validate([
            'title' => 'required|max:120|unique:posts,title',
            'image' => 'required|mimes:jpeg,jpg,png',
            'category' => 'required',
            'tags' => 'required',
            'body' => 'required',
            'featured_description' => 'required|max:100',



         ]);
        // dd($attr);

         if(request()->hasFile('image'))
         {
            $ext = request()->image->getClientOriginalExtension();
            $name = time().'.'.$ext;
            request()->image->move(public_path('images/posts'),$name);
         }

         if(request()->status)
         {
            $status = 'active';
         }
         else
         {
            $status  = 'pending';
         }

         return array_merge(array_filter($attr),[
            'images' => $name,
            'user_id' => Auth::id(),
            'slug' => str_slug(request()->title),
            'status' => $status, 
            'created_at' => now(),
         ]);

    }


    public function deleteImage($name)
    {
        $path  = public_path().'/images/posts/'.$name;
        if(file_exists($path))
        {
             unlink($path);     
        }
        else
        {
            return '';
        }
       
    }

    public function approved(Request $request , Post $post)
    {
        if(Gate::allows('isSuperAdmin'))
        {
           if($post->is_approved == '1')
           {
            $post->is_approved = '0';
            $post->save();
            return back()->with('success','Posts has been Un-Approved Successfully');
           }
           else
           {
                $post->is_approved = '1';
                $post->save();
                $post->user->notify(new PostApproved($post));
                return back()->with('success','Post has been approved Successfully');
           
            } 
        }

    }


    public function pending_posts(){

        if(Gate::allows('isSuperAdmin'))
        {
            $posts  = Post::where('is_approved','0')->paginate(10);
            return view('backend.post.index',compact('posts'));
        }
        else
        {
            return back()->with('success','Whoops Not so clever');
        }
    }

    public function archived_posts(){
        
            $posts  = Post::where('status','pending')->paginate(10);
            return view('backend.post.index',compact('posts'));
       
    }
    
}
