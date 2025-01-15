<?php

namespace App\Http\Controllers\Sections;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSectionRequest;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Teacher;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Grades = Grade::with(['Sections'])->get();
        $list_Grades = Grade::all();
        $teachers = Teacher::all();
    
        return view('pages.Sections.Sections', compact('Grades','list_Grades','teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSectionRequest $request)
    {
    
        try{
        $validated = $request->validated();

        $Sections = new Section();
        $Sections->Name_Section = [ 'ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En ];//getTranslation in blade
        $Sections->Grade_id = $request->Grade_id;
        $Sections->Class_id = $request->Class_id;
        $Sections->Status = 1;
        $Sections->save();

        // relation many to many Pivot table
        $Sections->teachers()->attach($request->teacher_id); 
        
        toastr()->success(trans('messages.success'));
        return redirect()->route('Sections.index');
    }
    catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSectionRequest $request)
    {
        try{
            $validated = $request->validated();
            $Sections = Section::findorfail($request->id);

            
            $Sections->Name_Section = ['ar' => $request->Name_Section_Ar,
                                        'en' => $request->Name_Section_En]; //getTranslation in blade
            $Sections->Grade_id = $request->Grade_id;
            $Sections->Class_id = $request->Class_id;
            
            if(isset($request->Status)) {
                $Sections->Status = 1;
            } else {
                $Sections->Status = 2;
            }
            
            // Update pivot Table "Teacher Name"
            if (isset($request->teacher_id)) {
                $Sections->teachers()->sync($request->teacher_id);
            } else {
                $Sections->teachers()->sync(array()); // sync: if the input already exists do nothing, and of not update it, and if removed delete it | if i used 'attach' it will add it everytime
            }
            
            $Sections->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Sections.index');
    
        }
    
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Section::findorfail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Sections.index');
    
    }

    public function getclasses($id)
    {
        $list_classes = Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");

        return $list_classes;
    }

}
