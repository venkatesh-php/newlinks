@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('home',he(Auth::user()->id)) }}"> Back</a>
            </div>
        </div>
    </div>
</div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
        <div class="panel panel-primary">
                    <div style="color:white" class="panel-heading"><center><h4>Edit Profile</h4></center></div>

                    <div class="panel-body">
    {!! Form::model($users, ['method' => 'PATCH','route' => ['Users.update', he($users->id)]]) !!}
    <div class="row">

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Full Name:</strong>
            {!! Form::text('fullname', null, array('placeholder' => 'Enter Your Full Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Father Name:</strong>
            {!! Form::text('fathername', null, array('placeholder' => 'Enter Your Father Name','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Mother Name:</strong>
            {!! Form::text('mothername', null, array('placeholder' => 'Enter Your Mother Name','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Enter Your Email','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Mobile Number:</strong>
            {!! Form::text('phone_number', null, array('placeholder' => 'Mobile Number','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Date Of Birth:</strong>
            {!! Form::date('dob', null, array('placeholder' => 'Select date of birth','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Birth Time:</strong>
            {!! Form::time('time', null, array('placeholder' => 'Select birth time','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Height:</strong>
            {!! Form::text('height', null, array('placeholder' => 'Enter height','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Weight:</strong>
            {!! Form::text('weight', null, array('placeholder' => 'Enter Weight','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Qualification:</strong>
            {!! Form::text('qualification', null, array('placeholder' => 'Qualification','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Job:</strong>
            {!! Form::text('job', null, array('placeholder' => 'Enter your Job','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Job Location:</strong>
            {!! Form::text('job_location', null, array('placeholder' => 'Enter your Job Location','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Salary  :</strong>
            {!! Form::text('salary', null, array('placeholder' => 'Enter your Salary','class' => 'form-control')) !!}
        </div>
    </div>



    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Religion  :</strong>
            <!-- {!! Form::text('religion', null, array('placeholder' => 'Enter your Religion','class' => 'form-control')) !!} -->
            <?php 
                use Illuminate\Http\Request;
                use App\Http\Requests;
                $religions = DB::table("religions")->get();
            ?>
            <select name="religion" id='religion' class="form-control" value="">
                <option value="" disabled="disabled" selected="selected">Select</option>  
                @foreach($religions as $religion)
                <option value="{{$religion->id}}">{{$religion->name}}</option> 
                @endforeach
            </select>
        </div>
    </div>


   

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Caste  :</strong>
            <!-- {!! Form::text('caste', null, array('placeholder' => 'Enter your Caste','class' => 'form-control')) !!} -->
            <?php 
                $castes = DB::table("castes")->get();
            ?>
            <select name="caste" id='caste' class="form-control" value="">
                <option value="" disabled="disabled" selected="selected">Select</option>  
                @foreach($castes as $caste)
                <option value="{{$caste->id}}">{{$caste->name}}</option> 
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Sub Caste  :</strong>
            {!! Form::text('sub_caste', null, array('placeholder' => 'Enter your sub_caste','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Gothram  :</strong>
            {!! Form::text('gothram', null, array('placeholder' => 'Enter your gothram','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Remarks  :</strong>
            {!! Form::text('remarks', null, array('placeholder' => 'Enter your Remarks IF ANY','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Describe Yourself:</strong>
            {!! Form::text('description', null, array('placeholder' => 'description about bride or Groom','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Present Address:</strong>
            {!! Form::text('present_address', null, array('placeholder' => 'Enter Present Address','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Permanent Address:</strong>
            {!! Form::text('permanent_address', null, array('placeholder' => 'Enter Permanant Address','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>


    </div>
    {!! Form::close() !!}

      </div>
    </div>
</div>
</div>
</div>


@endsection
