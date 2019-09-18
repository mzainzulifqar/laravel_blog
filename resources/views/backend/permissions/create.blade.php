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
                                    <h2 class="mt-0 mb-3" style="display: inline-block;">Permission</h2>
                                     <a href="{{route('permission.index')}}" style="display:inline-block" class="btn btn-info float-right" title="">Back</a>
                               
                                    <form role="form" action=@if(isset($permission))
                                    "{{route('permission.update',$permission->id)}}" @else() "{{route('permission.store')}}" @endif method="post">
                                    @if (isset($permission))
                                        @method('PUT')
                                    @endif

                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Permission Name</label>
                                            <input type="text" class="form-control" name="permission" ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Permission Name" value="{{@$permission->name}}">
                                            <small id="emailHelp" class="form-text text-muted">Kindly follow this format [ create - { permission-name } ].</small>
                                            
                                        </div>
                                            @error('permission')
                                            <span>
                                                <strong class="text-danger">{{$message}}</strong>
                                            </span>
                                            @enderror()
                                            <div style="padding-bottom: 10px;">
                                                
                                            </div>

                                            @if (isset($permission))
                                               <button type="submit" class="btn btn-primary">Update</button>
                                            @else
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            @endif
                                        
                                    </form>
                                
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

        {{-- <script src="{{asset('public/theme/assets/libs/raphael/raphael.min.js')}}"></script> --}}

        <!-- Dashboard init js-->
        {{-- <script src="{{asset('public/theme/assets/js/pages/dashboard.init.js')}}"></script> --}}


        <!-- Init js-->
        {{-- <script src="{{asset('public/theme/assets/js/pages/form-advanced.init.js')}}"></script> --}}


        <!-- App js -->
        <script src="{{asset('public/theme/assets/js/app.min.js')}}"></script>
            @endpush
               

                       
              @endsection()