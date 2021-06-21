<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

use App\Http\Requests\CheckRequest;
use League\CommonMark\Inline\Element\Code;

class CheckController extends Controller
{

    public function show()
    {
        return view('Pages.checkin');
    }

    public function authfun(CheckRequest $checkRequest)
    {
        //Get the form data
        $input = $checkRequest->only("validatecode","password");
        $code = $input['validatecode'];
        $password = $input['password'];

        //Check the Reserve code
        $authcodeMsg = $this->Authcode($code);
        if(!$authcodeMsg){
            return redirect()->route('check.show')->with('warning', 'Not this Reserve Code!');
        }

        //Check the Reserve if checked
        $reserved = $this->GetReserve($code);
        if($reserved->validate == 1){
            return redirect()->route('check.show')->with('warning', 'This validate code has checked!');
        }

        //Check the password
        $authPass = $this->Authpassword($reserved->user->email,$password);
        if(!$authPass){
            return redirect()->route('check.show')->with('warning', 'Your password is not Correct!');
        }

        //Adjust the validate status;
        $this->ChangeStatus($reserved);
        header("refresh:5;url=/checkin");

        //clear the certificated message
        Auth::logout();
        return view('Pages.UnitPages.success',['user' => $reserved->user]);
    }

    /**
     * Judge if has the code
     * @return bool
     */
    public function Authcode($code):bool
    {
        $reservenum = Reserve::where('reserve_code',$code)
            ->count();
        if($reservenum>0){
            return true;
        }
        return false;
    }

    /**
     * Judge if has this code
     * @return bool
     */
    public function Authpassword($email,$password):bool
    {
        $credentials = array('email'=>$email,"password"=>$password);
        if (Auth::attempt($credentials)) {
            return true;
        }
        return false;
    }

    /**
     * Change the validate status
     */
    public function ChangeStatus($reserved)
    {
        $reserved->validate = 1;
        $reserved->save();
    }

    /**
     * Get the Reserve object with the code
     */
    public function GetReserve($code)
    {
        return Reserve::where('reserve_code',$code)->first();
    }

}
