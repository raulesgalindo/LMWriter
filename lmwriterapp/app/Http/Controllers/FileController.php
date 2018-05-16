<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\File;

class FileController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $file = new File;
        $file->title = 'untitled';
        $file->content = '';
        $file->tags = '';
        $file->user_id = Auth::user()->id;
        $file->save();
        return view('modifyfile',['file'=>$file]);
    }
}
