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
                                    <h2>Post <span class="badge badge-warning">{{$posts->count()}}</span></h2>
                                    <div class="responsive-table-plugin" style="padding-bottom: 15px;">
                                    
                                        
                                        <div class="table-rep-plugin">
                                            <div class="table-responsive" data-pattern="priority-columns">
                                                <table id="tech-companies-1" class="table table-striped mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th data-priority="1">Title</th>
                                                        <th>User</th>
                                                        <th>Slug</th>
                                                        <th>Body</th>
                                                        <th>Views <i class="fas fa-eye"></i></th>
                                                        <th>Status</th>
                                                        <th>Approved</th>
                                                        <th>Action</th>
                                                        
                                                       
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (isset($posts) && $posts->count() > 0)
                                                           
                                                       
                                                        @foreach ($posts as $post)
                                                           
                                                     
                                                    <tr>
                                                        <th>{{$post->id}}</th>
                                                        <td>{{str_limit(uppercase($post->title),5)}}</td>
                                                        <td>{{uppercase($post->user->name)}}</td>
                                                        <td>{{str_limit($post->slug,15)}}</td>
                                                        <td>{!!str_limit($post->body,15)!!}...</td>
                                                        <td class="text-center">{{$post->views}}</td>
                                                        <td><span class="badge badge-{{post_status($post->status)['class']}}">{{post_status($post->status)["status"]}}</span></td>
                                                        <td><span class="badge badge-{{post_approved($post->is_approved)['class']}}">{{post_approved($post->is_approved)["status"]}}</span></td>
                                                       
                                                        <td>

                                                            <a href="{{url('post/'.$post->id.'')}}" style="margin-top:-16px;display: inline-flex;" class="btn btn-icon waves-effect waves-light btn-warning"><i class="fa fa-eye"></i></a>
                                                            @if ($post->user_id == Auth::user()->id || Auth::user()->isSuperAdmin())
                                                                
                                                            
                                                            <a href="{{url('post/'.$post->id.'/edit')}}" style="margin-top:-16px;display: inline-flex;" class="btn btn-icon waves-effect waves-light btn-warning"><i class="fa fa-wrench"></i></a>
                                                            @endif
                                                        
                                                        <p  onclick="event.preventDefault();document.getElementById('del-form-{{$post->id}}').submit()"  style="display:inline-flex;"class="btn btn-icon waves-effect waves-light btn-danger"><i class="fas fa-times"></i></p></td>

                                                        <form id="del-form-{{$post->id}}" action="{{url('post/'.$post->id)}}" method="POST" style="display:none;">
                                                            @method('DELETE')
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$post->id}}">
                                                           
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
                                    {{$posts->links()}}
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