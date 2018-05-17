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
    public function findByFilter(Request $request)
    {
        $files;
        if(strlen($request->filter) == 0){
            $files = File::where('user_id', '=', Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(15);
        }else{
            $filter = "%". $request->filter."%";
            $files = File::where('user_id', '=', Auth::user()->id)
            ->where(function($query) use($filter)
                {
                    $query->orWhere('title','like', $filter)->orWhere('tags','like', $filter)
                    ->orWhere('created_at','like', $filter)->orWhere('updated_at','like', $filter);
                })
            ->orderBy('updated_at', 'desc')->paginate(15);
        }
        return view('components.filteredwindow',['files'=>$files] );
    }

}
