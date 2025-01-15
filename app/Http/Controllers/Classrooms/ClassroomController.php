<?php 

namespace App\Http\Controllers\Classrooms;

use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassroomRequest;

class ClassroomController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $My_Classes = Classroom::all();
    $Grades = Grade::all();

    return view('pages.My_Classes.My_Classes', compact('My_Classes','Grades')); 
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
  public function store(StoreClassroomRequest $request)
  {
    // $this->validate($request, [
    //   'Name' => 'required|max:255',
    //   'Name_class_en' => 'required'
    // ],
    // [
    //   'Name.required' => trans('validation.required'),
    //   'Name_class_en.required' => trans('validation.required'),
    // ]);
    
    // List_Classes is in My_Classes.blade.php File cause it's a ''List''>>
    $List_Classes = $request->List_Classes;
    try{
      
      $validated = $request->validated();
      foreach ($List_Classes as $List_Class){
        $My_Classes = new Classroom();
        $My_Classes->Name_Class = ['en' => $List_Class['Name_class_en'], 'ar' => $List_Class['Name']]; //getTranslation in blade
        $My_Classes->Grade_id = $List_Class['Grade_id'];
        $My_Classes->save();
        
      }
      toastr()->success(trans('messages.success'));
      return redirect()->route('Classrooms.index');
      // $My_Classes = Classroom::all();
      // return view('pages.My_Classes.My_Classes', compact('My_Classes','Grades'));
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
  public function update( Request $request )
  {
    // return $request;
    // $validated = $request->validated();
    try{
      $Classrooms = Classroom::findorfail($request->id);
      $Classrooms-> update([
        $Classrooms->Name_Class = ['en' => $request->Name_en, 'ar' => $request->Name], //getTranslation in blade
        $Classrooms->Grade_id = $request->Grade_id,
      ]);

      toastr()->success(trans('messages.Update'));
      return redirect()->route('Classrooms.index');
      // $My_Classes = Classroom::all();
      // return view('pages.My_Classes.My_Classes', compact('My_Classes','Grades'));
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
    $Classrooms = Classroom::findorfail($request->id)->delete();
    toastr()->error(trans('messages.Delete'));
    return redirect()->route('Classrooms.index');
      // $My_Classes = Classroom::all();
      // return view('pages.My_Classes.My_Classes', compact('My_Classes','Grades'));
  }

  // Code for Deleting all selected rows "check Box"
  public function delete_all(Request $request)
  {
      $delete_all_id = explode(",", $request->delete_all_id);// explode makes an array, and using it cause it must me with "whereIn"
      
      Classroom::whereIn('id', $delete_all_id)->Delete();// "whereIn" not just "where" cause we use it with 'array' > more than 1-id = '5-id'
      toastr()->error(trans('messages.Delete'));
      return redirect()->route('Classrooms.index');
  }

// code for selecting a Grade to only show the whole classes attached to it
  public function Filter_Classes(Request $request)
  {
      $Grades = Grade::all();
      // $Search = Classroom::select('*')->where('Grade_id','=',$request->Grade_id)->get();
      // return view('pages.My_Classes.My_Classes', compact('Grades'))->withDetails($Search);
      
      $Search = Classroom::where('Grade_id', '=', $request->Grade_id)->get();
      return view('pages.My_Classes.My_Classes', compact('Grades'))->with('details', $Search);
      }
  
}

?>