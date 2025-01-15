<?php

namespace App\Http\Controllers\OnlineClasses;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Online_Class;
use App\Models\Section;
use App\Traits\MeetingZoomTrait;
use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;

class OnlineClassControllre extends Controller
{

    use MeetingZoomTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $online_classes = Online_Class::get();
        // $online_classes = Online_Class::where('created_by',auth()->user()->email)->get();
        return view('pages.online_classes.index', compact('online_classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Grades = Grade::all();
        return view('pages.online_classes.add', compact('Grades'));
    }


    public function indirectCreate()
    {
        $Grades = Grade::all();
        return view('pages.online_classes.indirect', compact('Grades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // adding zoom data auto from site
    {
        try {
        
            $meeting = $this->createMeeting($request);  // adding zoom data auto from site
            
            Online_Class::create([
                'integration' => true,
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'section_id' => $request->section_id,
                // 'user_id' => auth()->user()->id,
                'created_by' => auth()->user()->email,
                'meeting_id' => $meeting->id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $meeting->duration,
                'password' => $meeting->password,
                'start_url' => $meeting->start_url,
                'join_url' => $meeting->join_url,
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('online_classes.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function storeIndirect(Request $request)  // adding zoom data manually
    {
        try {
        
            Online_Class::create([
                'integration' => true,
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'section_id' => $request->section_id,
                // 'user_id' => auth()->user()->id,
                'created_by' => auth()->user()->email,
                'meeting_id' => $request->meeting_id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $request->duration,
                'password' => $request->password,
                'start_url' => $request->start_url,
                'join_url' => $request->join_url,
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('online_classes.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    public function editIndirect($id)
    {
        $onlineClass = Online_Class::findOrFail($id);
        
        $Grades = Grade::all();
        $Classrooms = Classroom::all();
        $Sections = Section::all();
        
        return view('pages.online_classes.edit', compact('onlineClass', 'Grades', 'Classrooms', 'Sections'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function updateIndirect(Request $request, $id)
    {
        try {
            $onlineClass = Online_Class::findOrFail($id);
            
            $onlineClass->update([
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'section_id' => $request->section_id,
                // 'user_id' => auth()->user()->id,
                // 'created_by' => auth()->user()->email,
                'meeting_id' => $request->meeting_id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $request->duration,
                'password' => $request->password,
                'start_url' => $request->start_url,
                'join_url' => $request->join_url,
            ]);
        
            toastr()->success(trans('messages.Update'));
            return redirect()->route('online_classes.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // try {
        //     $info = Online_Class::find($request->id);
            
        //     if($info->integration == true){
        //         $meeting = Zoom::meeting()->find($request->meeting_id);
        //         $meeting->delete();
        //     // Online_Class::where('meeting_id', $request->id)->delete();
        //         Online_Class::destroy($request->id);
        //     }
        //     else{
        //     // Online_Class::where('meeting_id', $request->id)->delete();
        //         Online_Class::destroy($request->id);
        //     }
            
        //     toastr()->error(trans('messages.Delete'));
        //     return redirect()->route('online_classes.index');
        // } 
        // catch (\Exception $e) {
        //     return redirect()->back()->with(['error' => $e->getMessage()]);
        // }
                                                                        
        Online_Class::destroy($request->id); 
        
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('online_classes.index');
                                                                        
    }
}
