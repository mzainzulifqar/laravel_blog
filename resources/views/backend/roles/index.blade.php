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
                                    <h2>Roles</h2>
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
                                                        @if (isset($roles) && $roles->count() > 0)
                                                        @foreach ($roles as $role)
                                                            {{-- expr --}}
                                                     
                                                    <tr>
                                                        <th>{{$role->id}}</th>
                                                        <td>{{uppercase($role->name)}}</td>
                                                        <td><a href="{{url('role/'.$role->id.'/edit')}}" class="btn btn-bordred-primary waves-effect  width-md waves-light">Edit</a></td>
                                                        <td><p  onclick="event.preventDefault();document.getElementById('del-form-{{$role->id}}').submit()" class="btn btn-bordred-danger waves-effect  width-md waves-light">Delete</p></td>

                                                        <form id="del-form-{{$role->id}}" action="{{url('role/'.$role->id)}}" method="POST" style="display:none;">
                                                            @method('DELETE')
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$role->id}}">
                                                           
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
                                    {{$roles->links()}}
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