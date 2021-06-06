<?php

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

function getCarnivalMax():int
{
    //Enter the Carnival Max Day
    return 5;
}

function getCarnivalDay():int{
    //Enter the CurrentDay
    return 2;
}
