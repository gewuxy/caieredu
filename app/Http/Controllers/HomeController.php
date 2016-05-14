<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index()
    {
        return view('home',['title' => '商家主页']);
    }

    public function getEditDetail(){
        return view('edit',['title' => '机构资料']);
    }

    public function postEditDetail(Request $request){
        $this->validate($request, [
            'orgName' => 'required',
            'orgAddressDetail' => 'required',
            'contacts' => 'required',
            'contactsNO' => 'required',
        ]);
        $user = $request->user();
        $user->organization = $request->orgName;
        $user->address = $request->province.$request->city.$request->district;
        $user->detailAddress = $request->orgAddressDetail;
        $user->introduction = $request->introduction;
        $user->contacts = $request->contacts;
        $user->contactsNO = $request->contactsNO;
        $user->save();

        return redirect('/home');
    }

    public function selectAddress(){
        
    }
}
