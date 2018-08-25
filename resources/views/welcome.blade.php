@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            
            <div class="title">                        
                <h1 style='color:black'><center>Welcome to SivaLinks Matrimonial Consultancy Services </center></h1>
            </div>     
            
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
            <h3 style='color:white'>3.If you wanna see other matches, need to pay.</h3>
            <h3 style='color:white'>4.Unlimited Access Fee : 1000/-</h3>
            <h3 style='color:white'>5.Account NO:20158838136, Jonnalagadda</h3>
            <h3 style='color:white'>6.IFSC Code : SBIN0001924.</h3>
            <h3 style='color:white'>7.Name : Venkateswarlu</h3>
            <h3 style='color:white'>8.Admin WhatsApp NO : 9848041175</h3>
            <h3 style='color:white'>9.Send us Payment ID (or) Screen Shot and Your ID, We'll activate with in 10 minutes</h3>
            

               
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
               
                <h3 style='color:white'> Total Users : {{ $users}}  </h3>      
               
            </div>
            
                <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                
                    <?php 
                    use Illuminate\Http\Request;
                    use App\Http\Requests;
                    $consultants = DB::table("consultants")->get();
        
                    
                    // $i =1;
                    ?>
                   
                            
                        @foreach($consultants as $consultant)
                        <?php 
                        $users = User::where('consultant_id',$consultant->id)->where('status',Null)->count();
                        ?>
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{route('profileImage',['name'=>$consultant->profile_pic])}}" alt="" class="img-circle" height="150" width="150">
                            </div>
                        
                            <div class="col-md-8">
                                <h3 style='color:white'>{{$consultant->name}} : {{$consultant->phone_number}} {{$consultant->address}} (Active Matches : {{$users}})</h3>
                            </div>
                        </div>
                        @endforeach
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
