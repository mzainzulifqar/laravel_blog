@extends('backend.layout.app')
   @push('css')
        
        {{-- ck-editior--}}
        {{-- <link type="text/css" href="{{asset('public/theme/ckeditor/css/sample.css')}}" rel="stylesheet" media="screen" /> --}}
        <!-- dropify -->
        <link href="{{asset('public/theme/assets/libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />

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
                                
                                  
                                        <div class="form-group" >
                                            <h2>{{$post->title}}</h2>
                                            <div style="background-color: lightgrey;margin-top:20px;">
                                              
                                            <blockquote>
                                              <p>
                                            Post By &nbsp;&nbsp;<strong>{{uppercase($post->user->name)}}</strong> &nbsp;on&nbsp;&nbsp; {{$post->created_at->toFormattedDateString()}} &nbsp;&nbsp;&nbsp;    @if($post->is_approved == false) <strong style="color:red;">Waiting for Approval</strong> @else <strong>Approved</strong> @endif</p></blockquote>
                                           

                                            </div>
                                              

                                         
                                        </div>


                                   
                                        <div class="form-group" style="padding-top:20px;">
                                            <h3>Featured Image</h3>

                                            @if (isset($post))
                                              
                                            
                                            <img style='width:100%;height:300px;margin-top:20px;border:1px solid black;border-style:dotted;display: inline-block;' src="{{asset('public/images/posts/'.$post->images)}}" alt="">
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
                                            $tagg = isset($post) && $post->tags->count() > 0 ? array_pluck($post->tags,'id') : '';
                                            // dd($tagg);
                                            $categories = isset($post) && $post->category->count() > 0 ? array_pluck($post->category,'id') : '';

                                        @endphp
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category</label>
                                          <select  class="js-example-basic-multiple" name="category[]" multiple="multiple" >
                                            @if (isset($category))
                                              @foreach ($category as $cat)
                                                  <option  value="{{$cat->id}}" {{isset($post) && in_array($cat->id,$categories) ? "selected" : ''}}>{{$cat->name}}</option>
                                              @endforeach
                                           @endif
                                        </select>
                                         
                                        </div>
                                      

                                         <div class="form-group">
                                             <label for="exampleInputEmail1">Tags</label>
                                          <select  class="js-example2-basic-multiple" name="tags[]" multiple="multiple" disabled="disabled">
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

                                        @if (!$post->is_approved)
                                          
                                       @can('approve-post', User::class)
                                           
                                      
                                        <a href="{{route('approve.post',$post->id)}}" style="display:inline-block" class="btn btn-success btn-block float-right" >Approve This Post</a>

                                         @endcan  
                                       @endif
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
                                                        <input class="custom-control-input" id="checkbox-large" name="status" disabled="disabled" type="checkbox" @if (isset($post))
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
                                      {!! @$post->body !!}
                                        <div>
                                            
                                      
                                             </div>
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>        

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

                  $(".js-example-basic-multiple").prop("disabled", false)
           
             $('.js-example-basic-multiple').select2({
                placeholder: "Select a Category",
                allowClear: true,
                // disabled : true,
                disabled: true,
             });

             $('.js-example2-basic-multiple').select2({
                placeholder: "Select a Tag",
                allowClear: true,
                disbled:true,
             });
            });
        </script>


     
            @endpush
               

                       
              @endsection()