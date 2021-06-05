<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReserveRequest;
use App\Models\Activity;
use App\Models\Reserve;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
    }

    public function newreserve(User $user){
        //check out of the day
        if(!$this->getOneDayCount())
            session()->flash('info', 'The day reserve num is out!');
            //There should be redirect???
        //There has another function to judge the day;
        $current_days = Activity::value('carnival_day');
        return view("Pages.newreserve",['current_day'=>$current_days],compact('user'));
    }


    public function edit(ReserveRequest $reserveRequest,User $user){

        $id = $user->id;
        $judgeOneDay= $this->getUserDayCount($id);
        $judgeAllDay= $this->getUserDayCountAll($id);
        if(!$judgeOneDay){
            return redirect()->route('newreserve')->with('warning', 'You have Reserve this day!');
        }
        if(!$judgeAllDay){
            return redirect()->route('newreserve')->with('warning', 'You have Reserve three day!');
        }
        $input = $reserveRequest->all();
        $i = 0;
        foreach ($input as $key => $item){
            //echo "{$key}==>{$item}<br>";
//            if($i>1){
//                $day = (int)$item;
//                //调用操作数据库访问函数
//                $reserve = new Reserve;
//                $reserve->user_id = $user->id;
//                $reserve->reserve_code = "abcdeg";
//                $reserve->event_id = $day;
//                $reserve->current_day = 2;
//                $reserve->validate = 0;
//                $reserve->save();
//            }
            $i++;
        }
        return redirect()->route('mainpage')->with('success', 'Reserve is Success！');
    }


    //TODO:添加预定，把数据放到数据库。可以通过request一下对这获得的day1-n进行都添加到数据库。Success
    //TODO:在dashboard中根据userid来查数据库 Success
    //TODO:当前预约函数判定，需要判断这个用户当前天数，是否预约。Success
    //TODO:总计预约函数判定，需要判断这个用户当前预约总天数。 小于3天。Success
    //TODO:函数4，输入当前天号，计算今天预约总数函数。Success
    //TODO:与当天天号进行判断，只显示大于当前日期的div
    //TODO:调用函数4，大于10进行页面提醒。Success
    //TODO:预定页面添加js代码，限定只能点一个
    //TODO:Session 对话框，3秒消失


    //TODO:张成伟，用户名添加限制、面面添加限制。
    //TODO:张成伟，cancel取消从数据中。
    //TODO:张成伟，生成唯一码。

    /**
     * Judge if the user has reserve
     * @return bool
     */
    public function getUserDayCount($id): bool
    {
        $current_day = 2;
        $reservenum = Reserve::where('user_id',$id)
            ->where('current_day',$current_day)->count();
        if($reservenum>0) {
            return false;
        }
        else {
            return true;
        }
    }

    /**
     * Judge if the user has reserve in all Days
     * @return bool
     */
    public function getUserDayCountAll($id): bool
    {
        $reservenum = Reserve::where('user_id',$id)
            ->count();
        if($reservenum<=3) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * Conut all reserves in one Day
     * @return bool
     */
    public function getOneDayCount(): bool
    {
        $current_day = 2;
        $reservenum = Reserve::where('current_day',$current_day)
            ->count();
        if($reservenum<=10) {
            return true;
        }
        else {
            return false;
        }
    }
}
