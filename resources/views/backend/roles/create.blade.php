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
                                    <h2 class="mt-0 mb-3" style="display: inline-block;">Role</h2>
                                     <a href="{{route('role.index')}}" style="display:inline-block" class="btn btn-info float-right" title="">Back</a>
                                   
                                    <form role="form" action=@if(isset($role))
                                    "{{route('role.update',$role->id)}}" @else() "{{route('role.store')}}" @endif method="post">
                                    @if (isset($role))
                                        @method('PUT')
                                    @endif

                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Role</label>
                                            <input type="text" class="form-control" name="role" ="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Role Name" value="{{@$role->name}}">
                                            

                                            @error('role')
                                            <span>
                                                <strong class="text-danger">{{$message}}</strong>
                                            </span>
                                            @enderror()

                                            <div>
                                              @error('permission')
                                                <span class="text-danger">{{$message}}</span>
                                            </div>
                                            @enderror()
                                            @if (isset($role))
                                            
                                            @php

                                                $name = permission_name($role->permissions);
                                            @endphp

                                            @endif
                                        <div class="card" style="margin-top: 20px;">
                                      <div class="card-header">Permissions</div>
                                        <div class="card-body">
                                            <div class="row">
                                            @foreach ($permissions as $permission)
                                          
                                                <div class="col-md-2 col-sm-2 col-4">
                                                   <label class="switch checkbox-inline">
                                                  <input type="checkbox" name="permission[{{$permission->name}}]"   @if(isset($role) && in_array($permission->name,$name)) checked @endif>
                                                  <span class="slider round"></span>

                                                </label>
                                                <p>{{$permission->name}}</p>
                                                </div> 

                                                
                                            @endforeach
                                 
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

        <!-- knob plugin -->
        <script src="{{asset('public/theme/assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>



        <!-- App js -->
        <script src="{{asset('public/theme/assets/js/app.min.js')}}"></script>
            @endpush
               


                       
              @endsection()