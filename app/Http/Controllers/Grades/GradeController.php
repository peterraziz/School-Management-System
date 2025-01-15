<?php 
//have to type the "namespace" Grades and "use" 
namespace App\Http\Controllers\Grades;

use App\Models\Grade;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGradesRequest;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class GradeController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $Grades = Grade::all();

    return view('pages.Grades.Grades', compact('Grades'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreGradesRequest $request)
  {

    // code for "Unique" not repeating the same coloumn name in the table:
    if (Grade::where('Name->ar', $request->Name)->orWhere('Name->en', $request->Name_en)->exists()) {
      return redirect()->back()->withErrors(trans('Grades_trans.exists'));
    };

    try{
      $validated = $request->validated();

      $Grade = new Grade();
      $Grade->Name = ['en' => $request->Name_en, 'ar' => $request->Name ]; //getTranslation in blade
      $Grade->Notes = $request->Notes;
      $Grade->save();
  
      toastr()->success('messages.success');
      return redirect()->route('Grades.index');
    }

    catch (\Exception $e){
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update( StoreGradesRequest $request)
  {
  // code for "Unique" not repeating the same coloumn name in the table:
    if (Grade::where('Name->ar', $request->Name)->orWhere('Name->en', $request->Name_en)->exists()) {
      return redirect()->back()->withErrors(trans('Grades_trans.exists'));
    };
    try{
      $validated = $request->validated();
      $Grades = Grade::findorfail($request->id);
      $Grades-> update([
        $Grades->Name = ['en' => $request->Name_en, 'ar' => $request->Name], //getTranslation in blade
        $Grades->Notes = $request->Notes,
      ]);

      toastr()->success(trans('messages.Update'));
      return redirect()->route('Grades.index');
      // $Grades = Grade::all();
      // return view('pages.Grades.Grades', compact('Grades'));

    }

    catch (\Exception $e){
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
//  Code for checking if the Grade List have some Classes for the Grade that i wanna delete, "dont delete it till u delete the classes first "
    $MyClass_id = Classroom::where('Grade_id', $request->id)->pluck('Grade_id');

    if($MyClass_id->count() == 0){
      $Grades = Grade::findorfail($request->id)->delete();
      toastr()->error(trans('messages.Delete'));
      return redirect()->route('Grades.index');
    }
    
    else{
      toastr()->error(trans('Grades_trans.delete_Grade_Error'));
      return redirect()->route('Grades.index');
    }

  }
  
}

?>