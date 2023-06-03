<?php

function isActiveRoute($routeName)
{

    $currentRoute = request()->segment(1) .'.'. request()->segment(2);
    return $currentRoute === $routeName ? 'shadow-soft-xl bg-white rounded-lg font-semibold text-slate-700' : '';
}
