<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\User;
use App\consultants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::find(Auth::user()->id);
        $consultants = DB::table('consultants')->where('consultants.id',$users->consultant_id)->get();
        foreach ($consultants as $consultant)
        {
            if($users->consultant_id == $consultant->id)
        {
            $users->cname = $consultant->name;
            $users->cnumber = $consultant->phone_number;
            $users->caddress = $consultant->address;
        }

        }
        
        // return $users;
        return view('home',compact('users'));
    }

    public function profileImage($name){
        $photo = Storage::disk('photo')->get($name);
        $response = Response::make($photo, 200);
        $response->header('Content-Type', 'image/png/jpg/jpeg/bmp');
        return $response;
    }
}
