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
//        $email = $request->input('email');
//        $password = $request->input('password');
//        $data = $request->all();
//        echo($email);
        //echo($data);
//        $dbcode = DB::table('reserves')->select('reserve_code')->get()->toArray();
//        for($i=0; $i < count($dbcode) ; $i++){
//            $dbid = DB::table('reserves')->where('reserve_code', $dbcode[$i])->get();
//            $dbpassword = DB::table('users')->where('id', $dbid)->get();
//            if($email == $dbcode[$i]){
//                if($password == $dbpassword){
//                    return view('Pages.checkin');
//                }
//            }
//        }
//        $reserve = Reserve::where('reserve_code', 'asdfghj')->get();
//        $nameee = $reserve;
//        echo($nameee);
//        foreach(Reserve::all() as $reserveee){
//            echo "<p>"."{$reserveee -> users()->getOwnerKeyName()}"."<p>";
//        }
//        $code = $request->input('validatecode');
//        $password = $request->input('password');

        //Get the form data
        $input = $checkRequest->only("validatecode","password");
        $code = $input['validatecode'];
        $password = $input['password'];

        //Check the Reserve code
        $authcodeMsg = $this->Authcode($code);
        if(!$authcodeMsg){
            session()->flash('erro', 'Not this Reserve Code!');
            return redirect()->route('check.show')->with('erro', 'Not this Reserve Code!');
        }
        //Check the Reserve if checked
        $reserved = $this->GetReserve($code);
        if($reserved->validate == 1){
            session()->flash('erro', 'This validate code has checked!');
            return redirect()->route('check.show')->with('erro', 'This validate code has checked!');
        }
        //Check the password
        $authPass = $this->Authpassword($reserved->user->email,$password);
        if(!$authPass){
            return redirect()->route('check.show')->with('erro', 'Your password is not Correct!');
        }
        //Adjust the validate status;
        $this->ChangeStatus($reserved);
        return view('Pages.UnitPages.success',['user' => $reserved->user]);
    }

    public function Authcode($code):bool
    {
        $reservenum = Reserve::where('reserve_code',$code)
            ->count();
        if($reservenum>0){
            return true;
        }
        return false;
    }

    public function Authpassword($email,$password):bool
    {
        $credentials = array('email'=>$email,"password"=>$password);
        if (Auth::attempt($credentials)) {
            return true;
        }
        return false;
    }

    public function ChangeStatus($reserved){
        $reserved->validate = 1;
        $reserved->save();
    }

    public function GetReserve($code){
        return Reserve::where('reserve_code',$code)->first();
    }

}