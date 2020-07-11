<?php

namespace Modules\Activity\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Activitylog\Models\Activity;

class ActivityController extends Controller
{

    public function Index(Request $request)
    {
        $activities = Activity::
            when($request->filled('causer_id'), function ($query) use ($request) {
            $query->where('causer_id', $request->causer_id)->get();
        })
            ->when($request->filled('causer_type'), function ($query) use ($request) {
                $query->where('causer_type', $request->causer_type)->get();
            })
            ->get();

        return view('activity::' . env("ADMIN_THEME") . '.index')->with('activities', $activities);
    }

}
