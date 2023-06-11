<?php

function isActiveRoute($routeName)
{
    if (request()->segment(2) === null) {
        $currentRoute = request()->segment(1);
    } else {
        $currentRoute = request()->segment(1) . '.' . request()->segment(2);
    }

    return $currentRoute === $routeName ? 'shadow-soft-xl bg-white rounded-lg font-semibold text-slate-700' : '';
}

function isActiveRouteProgram($routeName)
{

    $currentRoute = request()->segment(4);

    return $currentRoute === $routeName ? 'text-blue-700 border-b-2 border-blue-700' : '';
}

