@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading"><center><h2>SivaLinks Registration</h2></center></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                            <label for="fullname" class="col-md-4 control-label">Full Name</label>

                            <div class="col-md-6">
                                <input id="fullname" type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" required autofocus>

                                @if ($errors->has('fullname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                            <label for="phone_number" class="col-md-4 control-label">Phone Number</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" required>

                                @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label"> Gender</label>
                               
                                
                            <div class="col-md-6">
                                <select name="gender" id='gender' class="form-control" value="">
                                    <option value="" disabled="disabled" selected="selected">Select</option>  
                                
                                <option value="male">Male </option>
                                <option value="female">Female </option> 
                                
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('religion') ? ' has-error' : '' }}">
                            <label for="country" class="col-md-4 control-label"> Religion</label>
                                <?php 
                                    $religions = DB::table("religions")->get();
                                ?>   
                            <div class="col-md-6">
                                <select name="religion" id='religion' class="form-control" value="">
                                    <option value="" disabled="disabled" selected="selected">Select</option>  
                                @foreach($religions as $religion)
                                <option value="{{$religion->id}}">{{$religion->name}} </option> 
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('caste') ? ' has-error' : '' }}">
                            <label for="caste" class="col-md-4 control-label">Caste</label>
                            <div class="col-md-6">
                                <select name="caste" id="caste" class="form-control">
                              
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="consultant_id" class="col-md-4 control-label"> Consultant</label>
                                <?php 
                                use Illuminate\Http\Request;
                                use App\Http\Requests;
                                $consultants = DB::table("consultants")->get();
                                ?>
                                
                            <div class="col-md-6">
                                <select name="consultant_id" id='consultant_id' class="form-control" value="">
                                    <option value="" disabled="disabled" selected="selected">Select</option>  
                                @foreach($consultants as $consultant)
                                <option value="{{$consultant->id}}">{{$consultant->name}} -- {{$consultant->phone_number}} </option> 
                                @endforeach
                                </select>
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <h4>Note: If Phone Number has already taken, Contact Us -- 9848041175</h4> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
    $('#religion').change(function(){
    var religionID = $(this).val(); 
    // console.log(religionID);

    if(religionID){
        $.ajax({
            
           type:"GET",
           url:"{{url('/get_caste_list')}}/"+religionID,  

           success:function(data){  
            // console.log(data);
                    
            if(data){
                $("#caste").empty();
                $("#caste").append('<option>Select</option>');
                
                $.each(data,function(key,value){
                    $("#caste").append('<option value="'+value.id+'">'+value.name+'</option>');
                  
                });
                
           
            }else{
               $("#caste").empty();
            }
           }
        });
    }else{
        $("#caste").empty();
        
    }      
   });
});
</script>
@endsection
