<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
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
     * Save application
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function post(Request $request)
    {

        $rules = [
            'subject' => 'required',
            'body' => 'required',
            'file' => 'required',
        ];
        $messages = [
            'subject.required' => 'Введите имя заявки!',
            'body.required' => 'Введите текст заявки!',
            'file.required' => 'Прикрепите файл!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        $application = new Application();
        $application->subject = $request->subject;
        $application->body = $request->body;
        $path = $request->file('file')->store('public/application_files');
        $application->file = Storage::url($path);
        $application->user_id = Auth::user()->getAuthIdentifier();
        $application->save();

        return Redirect::route('success');
    }

    public function success()
    {
        return view('success');
    }
}
