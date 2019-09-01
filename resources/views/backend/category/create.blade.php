@extends('backend.layout.app')
   @push('css')
        

        <!-- dropify -->
        <link href="{{asset('public/theme/assets/libs/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="{{asset('public/theme/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/theme/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/theme/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{asset('public/theme/assets/css/custom.css')}}" rel="stylesheet" type="text/css" />
@endpush
@section('content')          
            <div class="content-page">
                <div class="content">
               
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <h2 class="mt-0 mb-3">Category</h2>
                                
                                    <form role="form" action=@if(isset($category) )
                                    "{{route('category.update',$category->id)}}" @else() "{{route('category.store')}}" @endif method="post" enctype="multipart/form-data" >
                                    @if (isset($category))
                                        @method('PUT')
                                    @endif

                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control" name="name" ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" value="{{@$category->name}}">
                                            

                                            @error('name')
                                            <span>
                                                <strong class="text-danger">{{$message}}</strong>
                                            </span>
                                            @enderror()
                                        </div>


                                   
                                        <div class="form-group">
                                            <label for="">Image</label>
                                               <input type="file" name="image" class="dropify" data-max-width="1000" data-max-file-size="1M" multiple  />
                                               <input type="hidden" name="hidden_image" value="{{@$category->image}}">
                                        </div>

                                      {{--    <div class="form-group">
                                            <label for="">Parent Category</label>
                                        <select name="" id="input" class="form-control" required="required">
                                            <option value="">zain</option>
                                            <option value="">zainnn</option>
                                        </select>
                                    </div> --}}
                                    
                                           
                                        <div class="card" style="margin-top: 20px;">
                                      <div class="card-header">Status</div>
                                            @error('status')
                                            <span>
                                                <strong class="text-danger">{{$message}}</strong>
                                            </span>
                                            @enderror()
                                            {{-- {{dd($category)}} --}}
                                        <div class="card-body">

                                            <div class="row">
                                          
                                                <div class="col-md-2 col-sm-2 col-4">
                                                   <label class="switch checkbox-inline">
                                                  <input type="checkbox" name="status" @if (isset($category))
                                                      @if ($category->status == 1)
                                                          checked
                                                      @endif
                                                      
                                                  @endif> 
                                                  <span class="slider round"></span>

                                                </label>
                                            <br>Status
                                                </div> 

                                             
                                 
                                            </div>

                                        </div>
                                     
                                          
                                       </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                            <!-- end col -->

                           

                        </div>
                        <!-- end row -->
                    
                </div>
                          @push('scripts')
                <!-- Vendor js -->
        <script src="{{asset('public/theme/assets/js/vendor.min.js')}}"></script>

            <!-- dropify js -->
        <script src="{{asset('public/theme/assets/libs/dropify/dropify.min.js')}}"></script>

        

        <!-- form-upload init -->
        <script src="{{asset('public/theme/assets/js/pages/form-fileupload.init.js')}}"></script>

        <!-- knob plugin -->
        <script src="{{asset('public/theme/assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>
        <!-- App js -->
        <script src="{{asset('public/theme/assets/js/app.min.js')}}"></script>



        <script>
            $(document).ready(function(){
                $('.dropify').dropify({
    tpl: {
        wrap:            '<div class="dropify-wrapper"></div>',
        loader:          '<div class="dropify-loader"></div>',
        message:         '<div class="dropify-message"><span class="file-icon" /> <p></p></div>',
        preview:         '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message"></p></div></div></div>',
        filename:        '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
        clearButton:     '<button type="button" class="dropify-clear"></button>',
        errorLine:       '<p class="dropify-error"></p>',
        errorsContainer: '<div class="dropify-errors-container"><ul></ul></div>'
    }
});
            });

        </script>
            @endpush
               

                       
              @endsection()