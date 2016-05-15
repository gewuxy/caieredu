<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * The task repository instance.
     *
     * @var TaskRepository
     */
    //protected $courses;
    
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
    public function index(Request $request)
    {
        $courses = Course::where('user_id', $request->user()->id)->get();
        return view('home',[
            'title' => '商家主页',
            'courses' => $courses,
        ]);
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

    public function createCource(){
        return view('createCourse',['title' => '新建课程']);
    }

    public function saveCource(Request $request){
        $this->validate($request, [
            'courseName' => 'required',
            'courseType' => 'required',
            'courseTime' => 'required',
            'minAge'     => 'required',
            'maxAge'     => 'required',
            'minNum'     => 'required',
            'maxNum'     => 'required',
            'courseAddressDetail' => 'required',
            'coursePrice' => 'required',
            'courseSummary' => 'required',
        ]);
        $request->user()->courses()->create([
            'name' => $request->courseName,
            'category' => $request->courseType,
            'startDate' => $request->courseTime,
            'minAge'  => $request->minAge,
            'maxAge'  => $request->maxAge,
            'minNum'  => $request->minNum,
            'maxNum' => $request->maxNum,
            'address' => $request->province.$request->city.$request->district,
            'detailAddress' => $request->courseAddressDetail,
            'price' => $request->coursePrice,
            'summary' => $request->courseSummary,
        ]);
        return redirect('/home');
    }
}
