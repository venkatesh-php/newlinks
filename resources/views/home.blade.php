@extends('layouts.app')
@section('content')
<style>
.td {
       
    font-family: "Times New Roman", Times, serif;
   }
</style>
@if ($message = Session::get('alert'))
    <div class="alert alert-danger">
        <h2>{{ $message }}</h2>
    </div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><center><h3>Your Profile</h3></center></div>

                <div class="panel-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">    
                                <div class="col-lg-6 col-xs-12 col-md-6 col-lg-6">
                                        
                                    @if($users->photo == Null)
                                    <img src="{{route('profileImage',['name'=>'dummy_pic.jpg'])}}" alt="" class="img-thumbnail" height="350" width="350">   
                                    @else
                                    <img src="{{route('profileImage',['name'=>$users->photo])}}" alt="" class="img-thumbnail" height="350" width="350">
                                    @endif
                                    
                                    <div class="row">
                                        @if($users->id == Auth::user()->id)
                                            <a class="btn btn-primary btn-xs" href="{{ route('Users.create') }}"> Update </a>
                                        @endif
                                    </div> 
                                </div>
                                <div class="col-lg-6 col-xs-12 col-md-6 col-lg-6">
                                    <div class="table-responsive">

                                        <table class="table table-striped" style="color:#2471A3">
                                        <tr>
                                            <th>Full Name</th><td>{{ $users->fullname }}</td>
                                        </tr>
                                        <tr>
                                            <th>Father Name</th><td>{{ $users->fathername  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Mother Name</th><td>{{ $users->mothername  }}</td>
                                        </tr>

                                        <tr>
                                            <th>Date Of Birth</th><td>{{ $users->dob  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Birth Time</th><td>{{ $users->time  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Height</th><td>{{ $users->height  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Weight</th><td>{{ $users->weight  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th><td>{{ $users->email  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Ph Number</th><td>{{ $users->phone_number  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Qualification</th><td>{{ $users->qualification  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Job</th><td>{{ $users->job  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Job Location</th><td>{{ $users->job_location  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Salary</th><td>{{ $users->salary }}</td>
                                        </tr>
                                        <tr>
                                            <th>Religion</th><td>{{ $users->creligion }}</td>
                                        </tr>
                                        <tr>
                                            <th>Caste</th><td>{{ $users->ccaste }}</td>
                                        </tr>
                                        <tr>
                                            <th>Sub Caste</th><td>{{ $users->sub_caste }}</td>
                                        </tr>
                                        <tr>
                                            <th>Gothram</th><td>{{ $users->gothram }}</td>
                                        </tr>
                                        <tr>
                                            <th>Remarks</th><td>{{ $users->remarks }}</td>
                                        </tr>
                                        
                                        <tr>
                                            <th>Present Address</th><td>{{ $users->present_address }}</td>
                                        </tr>
                                        <tr>
                                            <th>Permanent Address</th><td>{{ $users->permanent_address }}</td>
                                        </tr>
                                        <tr>
                                            <th>Describe Yourself</th><td>{{ $users->description }}</td>
                                        </tr>
                                        <tr>
                                            <th>Consultant Person</th><td>{{ $users->cname }}-{{ $users->cnumber }}</td>
                                        </tr>
                                        
                                        </table>
                                    </div>
                                </div>          
                            </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-10">
                                            @if($users->id == Auth::user()->id)
                                            <div class="pull-right">
                                                <a class="btn btn-primary" href="{{ route('Users.edit',he($users->id)) }}"> Edit Profile</a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
