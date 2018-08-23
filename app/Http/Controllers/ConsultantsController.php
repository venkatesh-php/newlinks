<?php

namespace App\Http\Controllers;

use App\Consultants;
use DB;
use Auth;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ConsultantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->payment == NULL)
        {
            return redirect()->back()->with('alert','Please make the payment to see Matches');
        }
        else{

        
        if(Auth::user()->gender == 'male')
        {
            $users = Users::orderBy('id','DESC')
            ->where('users.caste',Auth::user()->caste)
            ->where('users.gender','female') 
            ->paginate(1);
        }
        else
        {
            $users = Users::orderBy('id','DESC')
            ->where('users.caste',Auth::user()->caste)
            ->where('users.gender','male') 
            ->paginate(1);

        }

        $consultants = DB::table('consultants')->get();
        $religions = DB::table('religions')->get();
        $castes = DB::table('castes')->get();

        // return $castes;

        foreach ($users as $user)
        {
            foreach ($consultants as $consultant)
            {
                if($user->consultant_id == $consultant->id)
                {
                    $user->cname = $consultant->name;
                    $user->cnumber = $consultant->phone_number;
                    $user->caddress = $consultant->address;
                }
            }
        }
        foreach ($religions as $religion)
        {
            foreach ($users as $user)
            {
            if($user->religion == $religion->id)
            {
                $user->creligion = $religion->name;
            }
        }

        }
        foreach ($castes as $caste)
        {
            foreach ($users as $user)
            {
            if($user->caste == $caste->id)
            {
                $user->ccaste = $caste->name;
            }
        }

        }

        
        

        return view('User.index2',compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * 1);

    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consultants  $consultants
     * @return \Illuminate\Http\Response
     */
    public function show(Consultants $consultants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consultants  $consultants
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id1 = hd($id);
        // return $id1;
        return view('User.create2',compact('id1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consultants  $consultants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultants $consultants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consultants  $consultants
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultants $consultants)
    {
        //
    }
}
