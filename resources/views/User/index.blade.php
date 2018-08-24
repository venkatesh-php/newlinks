@extends('layouts.app')
 @section('content')
 



@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif




<div class="container-fluid">
    <div class="row">
    <div class="panel panel-primary">
    <div class="panel-body">
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr style="color:#660033">
                        <th>No</th>
                        <th>Name</th>
                        <th>F_Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Job</th>
                        <th>Salary</th>
                        <th>Status</th>
                        <th>Payment</th>
                        <th>Consultant</th>           
                        <th>Address</th>
                        <th>Options</th>
                    </tr>
                    @foreach ($users as $key => $task)
                    <tr style="color:#2471A3">
                        
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->fullname }}</td>
                        <td>{{ $task->fathername }}</td>
                        <td>{{ $task->phone_number }}</td>
                        <td>{{ $task->email}}</td>
                        <td>{{ $task->gender }}</td>
                        
                        <td>{{ $task->job}}</td>
                        <td>{{ $task->salary}}</td>
                        <td>{{ $task->status}}</td>
                        <td>{{ $task->payment}}</td>  
                        <th>{{ $task->consultant_id}}</th>      
                        <td>{{ $task->present_address}}</td>
                        
                        <td>
                
                            <a class="btn btn-primary btn-xs" href="{{ route('Users.edit',he($task->id)) }}">Edit</a>
                            <a class="btn btn-success btn-xs" href="{{ route('Users.show',he($task->id)) }}">Show</a>

                            {{--  {!! Form::open(['method' => 'DELETE','route' => ['AdminTasks.destroy', $task->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!} 
                            {!! Form::close() !!}  --}}
                        </td>
                       
                    </tr>
                    @endforeach
                </table>
                
            </div>
        </div>
        </div>
        </div>
    </div>
</div>
@endsection