<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

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
        $user->province = $request->province;
        $user->city = $request->city;
        $user->district = $request->district;
        $user->detailAddress = $request->orgAddressDetail;
        $user->introduction = $request->introduction;
        $user->contacts = $request->contacts;
        $user->contactsNO = $request->contactsNO;
        $user->headIcon = $this->ajaxUploadImage();
        $user->save();

        return redirect('/home');
    }

    public function createCource($id = -1){
        if($id == -1) {
            $title = '新建课程';
            $course = null;
        }else{
            $title = '编辑课程';
            $course = Course::where('id',$id)->first();
        }
        return view('createCourse',[
            'title' => $title,
            'course' => $course,
        ]);
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
            'province'   => 'required',
            'city'       => 'required',
            'district'   => 'required',
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
            'province' => $request->province,
            'city' => $request->city,
            'district' => $request->district,
            'detailAddress' => $request->courseAddressDetail,
            'price' => $request->coursePrice,
            'summary' => $request->courseSummary,
        ]);
        return redirect('/home');
    }

    public function ajaxUploadImage()
    {
        $file = Input::file('pictureupload');
        $input = array('image' => $file);

        $destinationPath = 'headIcons/';
        $filename = md5(microtime() . $file->getClientOriginalName()) . "." . $file->getClientOriginalExtension();
        Input::file('pictureupload')->move($destinationPath, $filename);
        return asset($destinationPath . $filename);

    }
}
