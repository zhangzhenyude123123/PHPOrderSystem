<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReserveRequest;
use App\Models\Reserve;
use App\Models\User;

class ReserveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
    }

    public function newreserve(User $user)
    {
        //check out of the day
        $judgenum = 0;
        $message = 'No More places in Day ';
        for($i = getCarnivalDay()+1;$i<=getCarnivalMax();$i++){
            if(!$this->getOneDayCount($i)){
                $message .= '{$i}'." ";
                $judgenum++;
            }
        }
        if($judgenum>0){
            session()->flash('info', $message);
        }

//        if(!$this->getOneDayCount())
//            session()->flash('info', 'There’s no more places');
//        $current_days = Activity::value('carnival_day');
//        $current_days = getCarnivalDay();
//        $max_days = getCarnivalMax();

        return view("Pages.newreserve",
            compact('user'));
    }


    public function edit(ReserveRequest $reserveRequest,User $user)
    {

        $id = $user->id;

        //check people for all days
        $judgeAllDay= $this->getUserDayCountAll($id);
        if(!$judgeAllDay){
            return redirect()->route('newreserve')->with('warning', 'You have Reserve three day!');
        }

        $day = $this->getReserveDay($reserveRequest);

        $judgeOneDay= $this->getUserDayCount($id,$day);
        if(!$judgeOneDay){
            return redirect()->route('newreserve')->with('warning', 'You have Reserve this day!');
        }

        $reserve = new Reserve;
        $reserve->user_id = $user->id;
        $reserve->reserve_code = "abcdee";
        $reserve->event_id = $day;
        $reserve->current_day = getCarnivalDay();
        $reserve->validate = 0;
        $reserve->save();
        return redirect()->route('mainpage')->with('success', 'Reserve is Success！');

        //get the input
//        $input = $reserveRequest->all();
//        $i = 0;
//        $day = 0;
//        foreach ($input as $key => $item){
//            //echo "{$key}==>{$item}<br>";
//            if($i>1){
//                $day = (int)$item;
//                //调用操作数据库访问函数
//                $reserve = new Reserve;
//                $reserve->user_id = $user->id;
//                $reserve->reserve_code = "abcdeg";
//                $reserve->event_id = $day;
//                $reserve->current_day = getCarnivalDay();
//                $reserve->validate = 0;
//                $reserve->save();
//            }
//            $i++;
//        }
    }


    public function getReserveDay(ReserveRequest $reserveRequest):int
    {
        $input = $reserveRequest->all();
        $i = 0;
        $day = 0;
        foreach ($input as $key => $item){
            //echo "{$key}==>{$item}<br>";
            if($i>1){
                $day = (int)$item;
            }
            $i++;
        }
        return $day;
    }

    /**
     * Judge if the user has reserve
     * @return bool
     */
    public function getUserDayCount($id,$day): bool
    {
        $current_day = $day;
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
    public function getOneDayCount($day): bool
    {
        $current_day = $day;
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

//TODO:添加预定，把数据放到数据库。可以通过request一下对这获得的day1-n进行都添加到数据库。Success
//TODO:在dashboard中根据userid来查数据库 Success
//TODO:当前预约函数判定，需要判断这个用户当前天数，是否预约。Success
//TODO:总计预约函数判定，需要判断这个用户当前预约总天数。 小于3天。Success
//TODO:函数4，输入当前天号，计算今天预约总数函数。Success
//TODO:与当天天号进行判断，只显示大于当前日期的div Success
//TODO:调用函数4，大于10进行页面提醒。Success
//TODO:一天只能预约一次的功能，(规定的）应该放到input获取下面，而且这个天，应该是input的day，进行查询。 Success
//TODO:每次在进行选择前，系统把超过10次的天数预定显示出来。Success
//TODO:checkin 之后，header显示不该显示的按钮,应该为清除session记录 Success
//TODO:cancel取消从数据中。 Success
//TODO:签到成功页面3秒跳转 Success

//TODO:预定页面添加js代码，限定只能点一个「改变这个需求」

//TODO:张成伟，用户名添加限制、面面添加限制。
//TODO:张成伟，生成唯一码。
