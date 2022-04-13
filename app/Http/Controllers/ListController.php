<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ListController extends Controller
{
    public function post(Request $request)
    {
        $applications = Application::whereIn('id', array_keys($request->ids))->get();
        foreach ($applications as $application) {
            if(isset($request->post('checked')[$application->id])) {
                $application->checked = 1;
            } else {
                $application->checked = 0;
            }
            $application->save();
        }
        return Redirect::back()->with('message', 'Статус заявок сохранен');;
    }
}
