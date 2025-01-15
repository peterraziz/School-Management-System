<?php

namespace App\Http\Controllers\Libraries;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Library::all();
        return view('pages.library.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grades = Grade::all();
        return view('pages.library.create',compact('grades'));
    }

/////////////////////////////////////////////////
    public function uploadFile($request,$name)
    // public function uploadFile($request,$name,$folder)
    {
        $file_name = $request->file($name)->getClientOriginalName();
        $request->file($name)->storeAs('attachments/library/',$file_name,'upload_attachments');
        // $request->file($name)->storeAs('attachments/',$folder.'/'.$file_name,'upload_attachments');
    }

    public function deleteFile($name)
    {
        $exists = Storage::disk('upload_attachments')->exists('attachments/library/'.$name);
        
        if($exists)
        {
            Storage::disk('upload_attachments')->delete('attachments/library/'.$name);
        }
    }
/////////////////////////////////////////////////


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $books = new Library();
            $books->title = $request->title;
            $books->file_name =  $request->file('file_name')->getClientOriginalName();
            $books->Grade_id = $request->Grade_id;
            $books->classroom_id = $request->Classroom_id;
            $books->section_id = $request->section_id;
            $books->teacher_id = 1;
            $books->save();
            
            $this->uploadFile($request,'file_name'); //file_name is a name in create.blade
            
            toastr()->success(trans('messages.success'));
            return redirect()->route('library.index');
        } 
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $grades = Grade::all();
        $book = library::findorFail($id);
        return view('pages.library.edit',compact('book','grades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            
            $book = library::findorFail($request->id);
            $book->title = $request->title;
            
            if($request->hasfile('file_name')){
                
                $this->deleteFile($book->file_name);  // first delete the exists file
                
                $this->uploadFile($request,'file_name');  // then add the other one
                
                $file_name_new = $request->file('file_name')->getClientOriginalName();
                $book->file_name = $book->file_name !== $file_name_new ? $file_name_new : $book->file_name;
            }
            
            $book->Grade_id = $request->Grade_id;
            $book->classroom_id = $request->Classroom_id;
            $book->section_id = $request->section_id;
            $book->teacher_id = 1;
            $book->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('library.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $this->deleteFile($request->file_name);
        
        library::destroy($request->id);
        
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();
    }


    public function downloadAttachment($filename)
    {
        return response()->download(public_path('attachments/library/'.$filename));
    }


}
