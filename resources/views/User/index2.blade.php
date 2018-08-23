@extends('layouts.app')
@section('content')
<style>
.td {
       
    font-family: "Times New Roman", Times, serif;
   }
</style>



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><center><h3>Your Matches</h3></center></div>

                <div class="panel-body">
                    <div class="container">
                        <div class="row">

                        @foreach ($users as $key => $user)
                            <div class="col-md-10">    
                                <div class="col-lg-6 col-xs-12 col-md-6 col-lg-6">
                                <div oncontextmenu="return false;">   
                                    @if($user->photo == Null)
                                    <img src="{{route('profileImage',['name'=>'dummy_pic.jpg'])}}" alt="" class="img-thumbnail" height="350" width="350">   
                                    @else
                                    <img src="{{route('profileImage',['name'=>$user->photo])}}" alt="" class="img-thumbnail" height="350" width="350">
                                    @endif
                                    </div>
                                    <h4 style='color:block'><b>Match ID : {{$user->id}} </b></h4>
             
                                </div>
                                <div class="col-lg-6 col-xs-12 col-md-6 col-lg-6">
                                    <div class="table-responsive">

                                        <table class="table table-striped" style="color:#2471A3">
                                        <tr>
                                            <th>Full Name</th><td>{{ $user->fullname }}</td>
                                        </tr>
                                        <tr>
                                            <th>Father Name</th><td>{{ $user->fathername  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Mother Name</th><td>{{ $user->mothername  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Date Of Birth</th><td>{{ $user->dob  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Birth Time</th><td>{{ $user->time  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Height</th><td>{{ $user->height  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Weight</th><td>{{ $user->weight  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Qualification</th><td>{{ $user->qualification  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Job</th><td>{{ $user->job  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Job Location</th><td>{{ $user->job_location  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Salary</th><td>{{ $user->salary }}</td>
                                        </tr>
                                        <tr>
                                            <th>Religion</th><td>{{ $user->creligion }}</td>
                                        </tr>
                                        <tr>
                                            <th>Caste</th><td>{{ $user->ccaste }}</td>
                                        </tr>
                                        <tr>
                                            <th>Sub Caste</th><td>{{ $user->sub_caste }}</td>
                                        </tr>
                                        <tr>
                                            <th>Gothram</th><td>{{ $user->gothram }}</td>
                                        </tr>
                                        <tr>
                                            <th>Remarks</th><td>{{ $user->remarks }}</td>
                                        </tr>
                                        <tr>
                                            <th>Description</th><td>{{ $user->description }}</td>
                                        </tr>
                                        <tr>
                                            <th>Consultant Person</th><td>{{ $user->cname }}-{{ $user->cnumber }}</td>
                                        </tr>
                                        
                                        </table>
                                    </div>
                                </div>          
                            </div>
                        @endforeach
                        {!! $users->render() !!}
                        </div>   
                    </div>     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection