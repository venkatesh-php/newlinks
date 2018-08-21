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
        //
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
        $id = Auth::user()->id;
        // $user_id = hd($request->user_id);
        // return $user_id;
        $this->validate($request, [
            'user_id' => 'required',
            'photo' => 'image | mimes:jpeg,bmp,png,jpg| max:5120',
           
        ]);
        
        $profile = new User();
        $profile->user_id = $request->user_id;
        $profile->photo = storeFile($request->photo,'photo');

        DB::table('users')->where('id', $profile['user_id'])
        ->update(['photo' => $profile['photo']]);

        if(isset(Auth::user()->photo)){   
            Storage::disk('photo')->delete(Auth::user()->photo);
        } 

        return redirect()->route('home')->with('success','Profile photo Uploded successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
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
            'job-location' => '',
            'salary' => '',
            'religion' => '',
            'caste' => '',
            'sub_caste'  => '',
            'gothram'  => '',
            'permanent_address'  => '',
            'present_address'  => '',
            'remarks'  => '',
            'description'  => '',
        ]);


        User::find($id1)->update($request->all());
        return redirect()->route('home',compact('id'))
                        ->with('success','Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $users)
    {
        //
    }
}
