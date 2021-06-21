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
        return view("Pages.newreserve",
            compact('user'));
    }


    public function edit(ReserveRequest $reserveRequest,User $user)
    {

        $id = $user->id;

        $day = $this->getReserveDay($reserveRequest);

        $FullJudge = $this->getOneDayCount($day);
        if(!$FullJudge){
            return redirect()->route('newreserve')->with('warning', 'Selecting this day have no more reservation!');
        }

        //check people for all days
        $judgeAllDay= $this->getUserDayCountAll($id);
        if(!$judgeAllDay){
            return redirect()->route('newreserve')->with('warning', 'You have Reserve three day!');
        }


        $judgeOneDay= $this->getUserDayCount($id);
        if(!$judgeOneDay){
            return redirect()->route('newreserve')->with('warning', 'You have Reserve Today!');
        }

        $reserve = new Reserve;
        $reserve->user_id = $user->id;

        //Getcode
        $flag = false;
        $code = '';
        while(!$flag){
            $str = 'abcdefghijklmnopqrstuvwxyz';
            $len = strlen($str)-1;
            for ($i=0;$i<6;$i++) {
                $num=mt_rand(0,$len);
                $code .= $str[$num];
            }
            $have = false;
            $reservenum = Reserve::where('reserve_code',$code)
                ->count();
            if($reservenum>0){
                $have = true;
            }
            if (!$have)
                $flag = true;
        }

        $reserve->reserve_code = $code;
        $reserve->event_id = $day;
        $reserve->current_day = getCarnivalDay();
        $reserve->validate = 0;
        $reserve->save();
        return redirect()->route('mainpage')->with('success', 'Reserve is Success！');
    }

    public function getReserveDay(ReserveRequest $reserveRequest):int
    {
        $input = $reserveRequest->all();
        $i = 0;
        $day = 0;
        foreach ($input as $key => $item){
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
    public function getUserDayCount($id): bool
    {
        $current_day = getCarnivalDay();
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
        if($reservenum<3) {
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
        $order_day = $day;
        $reservenum = Reserve::where('event_id',$order_day)
            ->count();
        if($reservenum<10) {
            return true;
        }
        else {
            return false;
        }
    }
}



