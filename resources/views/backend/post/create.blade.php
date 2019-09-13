@extends('backend.layout.app')
   @push('css')
        
        {{-- ck-editior--}}
        {{-- <link type="text/css" href="{{asset('public/theme/ckeditor/css/sample.css')}}" rel="stylesheet" media="screen" /> --}}
        <!-- dropify -->
        <link href="{{asset('public/theme/assets/libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />


         <link href="{{asset('public/theme/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="{{asset('public/theme/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/theme/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/theme/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{asset('public/theme/assets/css/custom.css')}}" rel="stylesheet" type="text/css" />
        <style type="text/css" media="screen">
            .custom-control-lg .custom-control-label::before,
.custom-control-lg .custom-control-label::after {
    top: 0.1rem !important;
    left: -2rem !important;
    width: 1.25rem !important;
    height: 1.25rem !important;
}

.custom-control-lg .custom-control-label {
    margin-left: 0.5rem !important;
    font-size: 1rem !important;
}
        </style>

@endpush
@section('content')          
            <div class="content-page">
                <div class="content">
               
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-8">
                                <div class="card-box" style="padding-bottom: 45px;">
                                    <h2 class="mt-0 mb-3" style="display: inline-block;">Post</h2>
                                     <a href="{{route('post.index')}}" style="display:inline-block" class="btn btn-warning float-right" title="">Back</a>
                                
                                    <form role="form" action=@if(isset($post) )
                                    "{{route('post.update',$post->id)}}" @else() "{{route('post.store')}}" @endif method="post" enctype="multipart/form-data" >
                                    @if (isset($post))
                                        @method('PUT')
                                    @endif

                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input type="text" class="form-control" name="title" ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title" value="{{@$post->title}}">
                                            

                                            @error('title')
                                            <span>
                                                <strong class="text-danger">{{$message}}</strong>
                                            </span>
                                            @enderror()
                                        </div>

                                          <div class="form-group">
                                            <label for="exampleInputEmail1">Featured Content</label>
                                          

                                               
                                            <textarea name="featured_description" id="featured_description" maxlength='100' class="form-control" rows="3" >{{@$post->featured_description}}</textarea>
                                            <span class="font-13 text-muted" style="display:inline;">Max 100 words</span>
                                                <div class="text-right pull-right" style="float:right;">
                                                   <span id="display_count" class="font-13 text-muted">
                                                   <span id="words_left" ></span>/100</span>
                                               </div>

                                            @error('featured_description')
                                            <span>
                                                <strong class="text-danger">{{$message}}</strong>
                                            </span>
                                            @enderror()
                                        </div>


                                   
                                        <div class="form-group">
                                            <label for="">Featured Image</label>
                                               <input type="file" name="image" class="dropify" data-max-width="2000" data-max-file-size="1M"  multiple  />

                                                  @error('image')
                                            <span>
                                                <strong class="text-danger">{{$message}}</strong>
                                            </span>
                                            @enderror()

                                            @if (isset($post))
                                              
                                            
                                            <img style='width:200px;height:200px;margin-top:20px;border:1px solid black;border-style:dotted;display: inline-block;' src="{{asset('public/images/posts/'.$post->images)}}" alt="">
                                            @endif
                                               
                                        </div>

                                     
                                    
                                     
                                      
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-md-4">
                                <div class="card-box">
                                    <div class="card">
                                        
                                    <div class="card-header bg-dark text-white">
                                        Category and Tags
                                    </div>
                                    <div class="card-body">
                                    
                                          @php
                                          $arr = [];

                                            $tagg = isset($post) && $post->tags->count() > 0 ? array_pluck($post->tags,'id') : $arr;
                                                                                        // dd($tagg);
                                            $categories = isset($post) && $post->category->count() > 0 ? array_pluck($post->category,'id') : $arr;

                                        @endphp
                                      
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category</label>
                                          <select class="js-example-basic-multiple" name="category[]" multiple="multiple">
                                            
                                            @if (isset($category) && $category->count() > 0)
                                              @foreach ($category as $cat)
                                                  <option value="{{$cat->id}}" {{isset($post) && in_array($cat->id,$categories) ? "selected" : ''}}>{{$cat->name}}</option>
                                              @endforeach
                                           @endif
                                        </select>
                                            @error('category')
                                            <span>
                                                <strong class="text-danger">{{$message}}</strong>
                                            </span>
                                            @enderror()
                                        </div>
                                      

                                         <div class="form-group">
                                             <label for="exampleInputEmail1">Tags</label>
                                          <select class="js-example2-basic-multiple" name="tags[]" multiple="multiple">
                                            @if (isset($tags))
                                            @foreach ($tags as $tag)
                                                 <option value="{{$tag->id}}" {{isset($post) && in_array($tag->id,$tagg) ? "selected" : ''}}>{{$tag->name}}</option>
                                            @endforeach
                                             
                                               @endif
                                        </select>
                                            @error('tags')
                                            <span>
                                                <strong class="text-danger">{{$message}}</strong>
                                            </span>
                                            @enderror()
                                        </div>
                                    </div>
                                    </div>

                                        <div class="card">
                                            <div class="card-header bg-dark text-white">Status</div>
                                                @error('status')
                                            <span>
                                                <strong class="text-danger">{{$message}}</strong>
                                            </span>
                                            @enderror()
                                              <div class="card-body bg-light">
                                                  <div class="row">
                                          
                                                <div class="col-md-12 col-sm-2 col-4">
                                                     <div class="custom-control-lg custom-control custom-checkbox">
                                                        <input class="custom-control-input" id="checkbox-large" name="status" type="checkbox" @if (isset($post))
                                                      @if ($post->status == 'active')
                                                          checked
                                                      @endif
                                                      
                                                  @endif/>
                                                        <label class="custom-control-label" for="checkbox-large">
                                                            Publish
                                                        </label>
                                                    </div>


                                                </div> 

                                             
                                 
                                            </div>

                                              </div> 
                                              
                                            </div>


                                   
                                      

                                     
                                    
                                     
                            </div>
                            {{-- end of col --}}

                           

                        </div>
                        <!-- end row -->

                </div>

                        <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box">
                                       
                                      <textarea class="form-control" name="body" id="description" placeholder="" rows="50">{{ @$post->body}}</textarea>
                                        <div>
                                            
                                       
                                         @error('body')
                                            <span>
                                                <strong class="text-danger">{{$message}}</strong>
                                            </span>
                                            @enderror()

                                             </div>
                                        <button type="submit" style="margin-top:15px;" class="btn btn-primary">Submit</button>
                                    </form>


                                    </div>

                                </div>

                        </div>
                        {{-- end of row --}}


               
                          @push('scripts')
                <!-- Vendor js -->
        <script src="{{asset('public/theme/assets/js/vendor.min.js')}}"></script>

        {{-- ckeditor js --}}
        {{-- <script src="{{asset('public/theme/ckeditor/js/ckeditor.js')}}"></script> --}}

        <script src="{{asset('public/templateEditor/ckeditor/ckeditor.js')}}"></script> 
            <!-- dropify js -->
        <script src="{{asset('public/theme/assets/libs/dropify/dropify.min.js')}}"></script>

      
            <script src="{{asset("public/theme/select2/dist/js/select2.min.js")}}"></script>
        <!-- form-upload init -->
        <script src="{{asset('public/theme/assets/js/pages/form-fileupload.init.js')}}"></script>

        <!-- knob plugin -->
        <script src="{{asset('public/theme/assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>
        <!-- App js -->
        <script src="{{asset('public/theme/assets/js/app.min.js')}}"></script>
        <script>

            
             // CKEDITOR.replace( 'editor' ); 
             // initSample(); 

       window.onload = function() {
        CKEDITOR.replace( 'description', {
            filebrowserUploadUrl: '{{ route('upload',['_token' => csrf_token() ]) }}'
        });
    };
  


            $(document).ready(function() {
             $('.js-example-basic-multiple').select2({
                placeholder: "Select a Category",
                allowClear: true
             });

             $('.js-example2-basic-multiple').select2({
                placeholder: "Select a Tag",
                allowClear: true
             });


        $("#featured_description").on('keydown', function(e) {
            var words  = $(this).val().length;
            // = $.trim(this.value).length ? this.value.match(/\S+/g).length : 0;
            
            if (words <= 100) {
                // $('#display_count').text(words);
                $('#words_left').text(words)
            }else{
                if (e.which !== 8) e.preventDefault();
            }
});

            });
        </script>


     
            @endpush
               

                       
              @endsection()