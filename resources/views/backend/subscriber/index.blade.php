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
                                    <h2 style="display: inline-block;">Subscribers</h2> <span style="font-size:16px;" class="badge badge-info">{{$subscriber->count()}}</span>
                                    <div class="responsive-table-plugin" style="padding-bottom: 15px;">
                                    
                                        
                                        <div class="table-rep-plugin">
                                            <div class="table-responsive" data-pattern="priority-columns">
                                                <table id="tech-companies-1" class="table table-striped mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th data-priority="1">Email</th>
                                                        
                                                        <th>Action</th>
                                                        
                                                       
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (isset($subscriber) && $subscriber->count() > 0)
                                                           
                                                       
                                                        @foreach ($subscriber as $sub)
                                                           
                                                     
                                                    <tr>
                                                        <th>{{$sub->id}}</th>
                                                        <td>{{$sub->email}}</td>
                                                        
                                                       
                                                        <td>

                                                        
                                                        
                                                        <p  onclick="event.preventDefault();document.getElementById('del-form-{{$sub->id}}').submit()"  style="display:inline-flex;"class="btn btn-icon waves-effect waves-light btn-danger"><i class="fas fa-times"></i></p></td>

                                                        <form id="del-form-{{$sub->id}}" action="{{url('subscriber/'.$sub->id)}}" method="POST" style="display:none;">
                                                            @method('DELETE')
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$sub->id}}">
                                                           
                                                        </form>
                                                        

                                                       
                                                    </tr>
                                                      @endforeach
                                                      @else
                                                      <tr ><td class="text-center" colspan="9"><h2>No Data Found</h2></td></tr>
                                                       @endif
                                                    </tbody>
                                                </table>
                                            </div>


    
                                        </div>

                                    </div>
                                    {{$subscriber->links()}}
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