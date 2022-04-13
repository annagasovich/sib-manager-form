<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ListController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Save checked applications
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function post(Request $request)
    {
        // check if no applications
        if (!$request->ids) {
            return Redirect::back();
        }

        // update only applications on page
        $applications = Application::whereIn('id', array_keys($request->ids))->get();
        foreach ($applications as $application) {
            if (isset($request->post('checked')[$application->id])) {
                $application->checked = 1;
            } else {
                $application->checked = 0;
            }
            $application->save();
        }
        return Redirect::back()->with('message', 'Статус заявок сохранен');;
    }
}
