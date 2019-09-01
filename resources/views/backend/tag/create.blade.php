@extends('backend.layout.app')
   @push('css')


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

                                    <h2 class="mt-0 mb-3" style="display: inline-block;">Tag</h2>

                                 <a href="{{route('tag.index')}}" style="display:inline-block" class="btn btn-info float-right" title="">Back</a>
                                   
                                    <form role="form" action=@if(isset($tag) )
                                    "{{route('tag.update',$tag->id)}}" @else() "{{route('tag.store')}}" @endif method="post"  >
                                    @if (isset($tag))
                                        @method('PUT')
                                    @endif

                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control" name="name" ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" value="{{@$tag->name}}">
                                            

                                            @error('name')
                                            <span>
                                                <strong class="text-danger">{{$message}}</strong>
                                            </span>
                                            @enderror()
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

       
        <!-- knob plugin -->
        <script src="{{asset('public/theme/assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>
        <!-- App js -->
        <script src="{{asset('public/theme/assets/js/app.min.js')}}"></script>

       


       
            @endpush
               

                       
              @endsection()