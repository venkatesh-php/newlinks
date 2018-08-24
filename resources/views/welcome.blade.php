@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <center>
                    <div class="title">                        
                        <h1 style='color:black'>Welcome to SivaLinks Matrimonial Consultancy Services </h1>
                    </div>     
            </center>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="title">                        
                <h2 style='color:white'><u>Registration Instructions </u></h2>
            </div>  
            <h3 style='color:white'>1.Registration Free</h3>
            <h3 style='color:white'>2.You'll visible to all Sutable Matches</h3>
            <h3 style='color:white'>3.Female's have full rights.</h3>
            <h3 style='color:white'>4.You'll get unlimited access of all matches.</h3>
            <h3 style='color:white'>5.Male's need to pay Fee : 500/-</h3>
            <h3 style='color:white'>6.Account NO:20158838136, Jonnalagadda</h3>
            <h3 style='color:white'>7.IFSC Code : SBIN0001924.</h3>
            <h3 style='color:white'>8.Name : Venkateswarlu</h3>
            <h3 style='color:white'>9.WhatsApp NO : 9848041175</h3>

               
        </div>

        <div class="col-md-6">
            <div class="title">                        
                <h2 style='color:white'><u>List of Consultant Persons </u></h2>
            </div> 
            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            
                <?php 
                use App\User;
                $users = User::all()->count();
                ?>
                <div class="col-md-12">
                    <h3 style='color:white'> Total Users So far : {{ $users}}  </h3>      
                </div>
            </div>
            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            
                <?php 
                use Illuminate\Http\Request;
                use App\Http\Requests;
                $consultants = DB::table("consultants")->get();
    
                
                $i =1;
                ?>
                
                <div class="col-md-12">
                        
                    @foreach($consultants as $consultant)
                    <?php 
                    $users = User::where('consultant_id',$consultant->id)->count();
                    ?>
                    <h3 style='color:white'>{{$i++}} . {{$consultant->name}} : {{$consultant->phone_number}} {{$consultant->address}} (Matches : {{$users}})</h3>
                    @endforeach
                    
                </div>
            </div>  

            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <h3 style='color:white'> WE CAN ADD NEW CONSULTANTS HERE </h3>      
                </div>
            </div>    
        </div>
    </div>
</div>



               
           
    

@endsection
