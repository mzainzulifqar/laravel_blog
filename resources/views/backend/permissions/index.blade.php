@extends('backend.layout.app') 
       @push('css')
   
        <!-- App css -->
        <link href="{{asset('public/theme/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/theme/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/theme/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{asset('public/theme/assets/css/custom.css')}}" rel="stylesheet" type="text/css" />
@endpush
    @section('content')
           <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">


                        <div class="row">
                            <div class="col-12">

                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h2>Permissions</h2>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="dropdown">
                                              <button type="button" class=" btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                <i class="ti-filter"></i>
                                                 Filter By
                                              </button>
                                              <div class="dropdown-menu">
                                               
                                                <a class="dropdown-item" href="{{route('permission.filter',['name' => 'role'])}}">Role</a>
                                                <a class="dropdown-item" href="{{route('permission.filter',['name' => 'permission'])}}">Permissions</a>
                                                <a class="dropdown-item" href="{{route('permission.filter',['name' => 'user'])}}">User</a>
                                                <a class="dropdown-item" href="{{route('permission.filter',['name' => 'brand'])}}">Brands</a>
                                                <a class="dropdown-item" href="{{route('permission.filter',['name' => 'cateogry'])}}">Category</a>
                                                <a class="dropdown-item" href="{{route('permission.filter',['name' => 'order'])}}">Orders</a>

                                              </div>
                                            </div>
                                            @if(Request::has('name'))
                                            <a href="{{route('permission.index')}}" title="">Clear Filter</a>
                                            @endif()
                                        </div>
                                    </div>
                                    

                                    <div class="responsive-table-plugin" style="padding-bottom: 15px;">
                                       
                                        
                                        <div class="table-rep-plugin">
                                            <div class="table-responsive" data-pattern="priority-columns">
                                                <table id="tech-companies-1" class="table table-striped mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th data-priority="1">Name</th>
                                                        
                                                        <th>Edit</th>
                                                        <th>Delete</th>
                                                       
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (isset($permissions) && $permissions->count() > 0)
                                                            
                                                        @foreach ($permissions as $permission)
                                                            {{-- expr --}}
                                                     
                                                    <tr>
                                                        <th>{{$permission->id}}</th>
                                                        <td>{{uppercase($permission->name)}}</td>
                                                        <td><a href="{{url('permission/'.$permission->id.'/edit')}}" class="btn btn-bordred-primary waves-effect  width-md waves-light">Edit</a></td>
                                                        <td><p  onclick="event.preventDefault();document.getElementById('del-form-{{$permission->id}}').submit()" class="btn btn-bordred-danger waves-effect  width-md waves-light">Delete</p></td>

                                                        <form id="del-form-{{$permission->id}}" action="{{url('permission/'.$permission->id)}}" method="POST" style="display:none;">
                                                            @method('DELETE')
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$permission->id}}">
                                                           
                                                        </form>
                                                        

                                                       
                                                    </tr>
                                                      @endforeach


                                                        @endif

                                                      @if(isset($result))
                                                       @foreach ($result as $p)
                                                            {{-- expr --}}
                                                     
                                                    <tr>
                                                        <th>{{$p->id}}</th>
                                                        <td>{{uppercase($p->name)}}</td>
                                                        <td><a href="{{url('p/'.$p->id.'/edit')}}" class="btn btn-bordred-primary waves-effect  width-md waves-light">Edit</a></td>
                                                        <td><p  onclick="event.preventDefault();document.getElementById('del-form-{{$p->id}}').submit()" class="btn btn-bordred-danger waves-effect  width-md waves-light">Delete</p></td>

                                                        <form id="del-form-{{$p->id}}" action="{{url('p/'.$p->id)}}" method="POST" style="display:none;">
                                                            @method('DELETE')
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$p->id}}">
                                                           
                                                        </form>
                                                        

                                                       
                                                    </tr>
                                                      @endforeach
                                                      @else
                                                      <tr ><td class="text-center" colspan="6"><h2>No Data Found</h2></td></tr>
                                                       @endif
                                                    </tbody>
                                                </table>
                                            </div>


    
                                        </div>

                                    </div>
                                    @if (isset($permissions))
                                        
                                    {{$permissions->links()}}
                                    @endif
                                </div>

                            </div>
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->
                            @push('scripts')
                <!-- Vendor js -->
        <script src="{{asset('public/theme/assets/js/vendor.min.js')}}"></script>

        <!-- knob plugin -->
        <script src="{{asset('public/theme/assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>


        <!-- App js -->
        <script src="{{asset('public/theme/assets/js/app.min.js')}}"></script>
            @endpush
               

               

      @endsection()