<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\File;
use Redirect;

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
    public function createFile()
    {
        $file = new File;
        $file->title = 'untitled';
        $file->content = '';
        $file->tags = '';
        $file->user_id = Auth::user()->id;
        $file->save();
        return view('modifyfile',['file'=>$file]);
    }

    public function updateFile(Request $request)
    {
        $file = File::find($request->id);
        return view('modifyfile',['file'=>$file]);
    }

    public function deleteFile(Request $request)
    {
        
        try{
            $file = File::find($request->id);
            $file->delete();
        
        }catch(\Exception $e){

            //$request->session()->flash('alert-danger', $e->getMessage());
            
        }

        return Redirect::to('home');

    }
    public function saveFile(Request $request)
    {
        $file = File::find($request->id);
        $file->title = $request->title;
        $file->content = $request->content;
        $file->tags = $request->tags;
        $file->save();
    }

}
