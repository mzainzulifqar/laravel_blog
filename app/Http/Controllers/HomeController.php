<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Contact;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
     $category  = Category::whereHas('greatgrandfather',function($query)
        {
                $query->where('parent_id',0);
        })->where('status','1')->get();
    
     $category_all = Category::inRandomOrder()->take(4)->get();

     $top_post = Post::where('is_approved',1)->latest()->take(1)->first();
     // dd($top_post);

     $top_stories = Post::where('views','>',50)->where('is_approved','1')->inRandomOrder()->take(3)->get(); //this is also showing in aside popular stories tag
     $trending_stories = Post::where('views','>',10)->where('is_approved','1')->inRandomOrder()->take(6)->get(); 
     if(isset($top_post)){
       $posts = Post::where('id','!=',$top_post->id)->where('is_approved','1')->latest()->take(4)->get();
     }
         //this is also showing in aside recent stories tag
     $rand_posts = Post::where('is_approved','1')->inRandomOrder()->take(8)->get();
     // dd($rand_posts);

     $tags = Tag::inRandomOrder()->take(8)->get();
     
     
        return view('frontend.index',compact('category','posts','top_post','top_stories','trending_stories','rand_posts','category_all','tags'));
    }

    public function get_post($slug){

            $category  = Category::whereHas('greatgrandfather',function($query)
        {
                $query->where('parent_id',0);
        })->where('status','1')->get();



        $post = Post::where('slug','=',$slug)->first();
        if($post)
        {
        $blog_key = 'blog_'.$post->id;

            if(!Session::has($blog_key))
            {
                $post->increment('views');
                Session::put($blog_key, 1);
            }

         
             $random_posts = Post::inRandomOrder()->take(2)->get();

         $tags = Tag::inRandomOrder()->take(8)->get();
       
          // dd($tags);

        $category_all = Category::inRandomOrder()->take(4)->get();
        $posts = Post::where('is_approved','1')->latest()->take(4)->get();
         //this is also showing in aside recent stories tag
        $top_stories = Post::where('views','>',50)->where('is_approved','1')->inRandomOrder()->take(3)->get(); //this is also showing in aside popular stories tag
       
        if($post)
        {

            return view('frontend.post-format-standard',get_defined_vars());    
        }
        else
        {
            abort(404);
        }
      }
      else
      {
        abort(404);
      }
        
    }


    public function fetch_auther_details($name)
    {
           $category  = Category::whereHas('greatgrandfather',function($query)
        {
                $query->where('parent_id',0);
        })->where('status','1')->get();

         $user = User::where('name','=',$name)->first();
         $category_all = Category::inRandomOrder()->take(4)->get();
        
        if($user)
        {
            return view('frontend.author',compact('user','category_all','category'));    
        }
        else
        {
            abort(404);
        }
    }

     public function about_us(){

          $category  = Category::whereHas('greatgrandfather',function($query)
        {
                $query->where('parent_id',0);
        })->where('status','1')->get();

        $category_all = Category::inRandomOrder()->take(4)->get();
         $posts = Post::where('is_approved','1')->latest()->take(4)->get();
         //this is also showing in aside recent stories tag
          $top_stories = Post::where('views','>',50)->where('is_approved','1')->inRandomOrder()->take(3)->get(); //this is also showing in aside popular stories tag
          $publishers = User::whereHas('role',function($q)
          {
                $q->where('name','auther')->orWhere('name','publishers');
          })->take(6)->get();
       
            return view('frontend.about-us',compact('category_all','posts','top_stories','publishers','category'));    
        
    }

    public function contact_us(){

          $category  = Category::whereHas('greatgrandfather',function($query)
        {
                $query->where('parent_id',0);
        })->where('status','1')->get();
        return view('frontend.contact',compact('category_all','posts','top_stories','publishers','category'));    
        
    }

    public function contact_us_form(Request $request)
    {
        $request->validate([
            "contact_name" => "required",
            "contact_phone" => "required",
            "contact_email" => "required|email",
            "contact_message" => "required",
        ]);
        

        $result = Contact::create([
            'name' =>$request->contact_name,
            'phone' => $request->contact_phone,
            'email' => $request->contact_email,
            'message' => $request->contact_message,
        ]);

        if($result)
        {
            return back()->with('success','Thanks For Contacting Us');
        }
    }

    public function get_category_related_posts(Request $request)
    {
        $slug = $request->category;

         $category  = Category::whereHas('greatgrandfather',function($query)
        {
                $query->where('parent_id',0);
        })->where('status','1')->get();

        $category_all = Category::inRandomOrder()->take(4)->get();
         $posts = Post::where('is_approved','1')->latest()->take(4)->get();
         //this is also showing in aside recent stories tag
          $top_stories = Post::where('views','>',50)->where('is_approved','1')->inRandomOrder()->take(3)->get(); //this is also showing in aside popular stories tag
       

       $data =  Post::whereHas('category',function($q) use ($slug)
        {
            $q->where('slug','LIKE','%'.$slug.'%');
        })->where('is_approved',1)->paginate(8);

       

        return view('frontend.category',compact('data','category','category_all','posts','top_stories','slug'));
    }


    public function post_comment(Request $request)
    {
      $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'comment_message'=>'required|max:',
      ]);

      $comment = Comment::create([
          'name' => $request->name,
          'email' => $request->email,
          'comment' => $request->comment_message,
          'post_id' => $request->post_id,
      ]);

      if($comment)
      {
        return back()->with('success','Comment has been posted');
      }
    }


    public function get_tags_related_posts(Request $request)
    {
      $slug  = $request->tag;
      // dd($slug);
      $category  = Category::whereHas('greatgrandfather',function($query)
        {
                $query->where('parent_id',0);
        })->where('status','1')->get();

       $data =  Post::whereHas('tags',function($q) use ($slug)
        {
            $q->where('name','LIKE','%'.$slug.'%');
        })->where('is_approved',1)->paginate(8);

         $tags = Tag::inRandomOrder()->take(8)->get();
       
       
    
      $category_all = Category::inRandomOrder()->take(4)->get();
      $posts = Post::where('is_approved','1')->latest()->take(4)->get();
       //this is also showing in aside recent stories tag
      $top_stories = Post::where('views','>',50)->where('is_approved','1')->inRandomOrder()->take(3)->get(); //this is also showing in aside popular stories tag

        return view('frontend.category',compact('data','tags','category','category_all','posts','top_stories','slug'));

    }

    public function search(Request $request)
    {
      $slug  = $request->input('query');
      // dd($slug);
        // i know it should be named as query but in view we display var name slug so u knw what...
      $category  = Category::whereHas('greatgrandfather',function($query)
        {
                $query->where('parent_id',0);
        })->where('status','1')->get();

       $data =  Post::where('title','LIKE','%'.$slug.'%')->orWhere('slug','LIKE','%'.$slug.'%')->orderBy('views')->paginate(10);
      

        $tags = Tag::inRandomOrder()->take(8)->get();
       
       
    
      $category_all = Category::inRandomOrder()->take(4)->get();
      $posts = Post::where('is_approved','1')->latest()->take(4)->get();
       //this is also showing in aside recent stories tag
      $top_stories = Post::where('views','>',50)->where('is_approved','1')->inRandomOrder()->take(3)->get(); //this is also showing in aside popular stories tag

        return view('frontend.category',compact('data','tags','category','category_all','posts','top_stories','slug'));

    }

}
