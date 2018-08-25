<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->id == 1 || Auth::user()->id == 2 )
        {
            $users = User::all();
        }
      
        return view('User.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('User.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->user_id;
        $id1 = he($request->user_id);
        // $id1 = hd($id);/
        // $user_id = hd($request->user_id);
        // return $id1;
        $this->validate($request, [
            'user_id' => 'required',
            'photo' => 'image | mimes:jpeg,bmp,png,jpg| max:5120',
           
        ]);
        // return $request->photo;
        $profile = new User();
        $profile->user_id = $request->user_id;
        $profile->photo = storeFile($request->photo,'photo');
        // return $profile['photo'];

        if(isset(Auth::user()->photo)){   
            Storage::disk('photo')->delete(Auth::user()->photo);
        }

        DB::table('users')->where('id', $profile['user_id'])
        ->update(['photo' => $profile['photo']]);

        // if(isset($request->photo)){   
        //     Storage::disk('photo')->delete($request->photo);
        // } 
       
        if(Auth::user()->id == $request->user_id)
        {
            return redirect()->route('home')
            ->with('success','Profile updated successfully');
        }
        else{
            return redirect()->route('Users.show',compact('id1'))
            ->with('success','Profile updated successfully');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id1 = hd($id);
        $users = User::find($id1);
        $consultants = DB::table('consultants')->where('consultants.id',$users->consultant_id)->get();
        $religions = DB::table('religions')->where('religions.id',$users->religion)->get();
        $castes = DB::table('castes')->where('castes.id',$users->caste)->get();

        foreach ($consultants as $consultant)
        {
            if($users->consultant_id == $consultant->id)
            {
                $users->cname = $consultant->name;
                $users->cnumber = $consultant->phone_number;
                $users->caddress = $consultant->address;
            }

        }
        foreach ($religions as $religion)
        {
            if($users->religion == $religion->id)
            {
                $users->creligion = $religion->name;
            }

        }
        foreach ($castes as $caste)
        {
            if($users->caste == $caste->id)
            {
                $users->ccaste = $caste->name;
            }

        }
        
        // return $users;
        return view('User.show',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id1 = hd($id);
        $users = User::find($id1);
        return view('User.edit',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $id1 = hd($id);
        $this->validate($request, [
            'fullname' => '',
            'fathername' => '',
            'mothername' => '',
            'email' => '',
            'dob' => '',
            'time' => '',
            'height' => '',
            'weight' => '',
            'phone_number' => '',
            'gender' => '',
            'qualification' => '',
            'job' => '',
            'job_location' => '',
            'salary' => '',
            'religion' => '',
            'caste' => '',
            'sub_caste'  => '',
            'gothram'  => '',
            'permanent_address'  => '',
            'present_address'  => '',
            'remarks'  => '',
            'description'  => '',
            'status'  => '',
            'payment'  => '',
        ]);


        User::find($id1)->update($request->all());
        if(Auth::user()->id == $id1)
        {
            return redirect()->route('home')
            ->with('success','Profile updated successfully');
        }
        else{
            return redirect()->route('Users.show',compact('id'))
            ->with('success','Profile updated successfully');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id1 = hd($id);
        $users = User::findOrFail($id1);
        $users->delete();
        return redirect()->route('Users.index');

    }

    public function getCasteList(Request $request)
    {
        // return $request->id;
        $caste = DB::table("castes")
                    ->where("religion_id",$request->id)
                    ->get();
        return $caste;
        
    }
}
