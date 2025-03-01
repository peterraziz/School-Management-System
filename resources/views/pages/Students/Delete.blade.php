<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_Student{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{trans('Students_trans.Deleted_Student')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('Students.destroy','test')}}" method="post">
                    @csrf
                    @method('DELETE')
                
                    <input type="hidden" name="id" value="{{$student->id}}">
                
                    <h5 style="font-family: 'Cairo', sans-serif;">
                        <span class="text-danger" > 
                        {{trans('Students_trans.Deleted_Student_tilte')}}
                        </span>
                    </h5>
                    <hr>
                    
                    <h6 style="font-family: 'Cairo', sans-serif;">
                        <span class="text-danger" >
                            {{$student->name}}
                        </span>
                        
                        <br> 
                        
                        <span class="text-danger">
                            {{$student->grade->Name}} - {{$student->classroom->Name_Class}} - {{$student->section->Name_Section}}
                            {{-- | {{trans('Students_trans.Phone_number')}}= {{$student->Phone_number}} | {{trans('Students_trans.email')}}= {{$student->email}}" --}}
                        </span>
                    </h6>
                    
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Students_trans.Close')}}</button>
                        <button  class="btn btn-danger">{{trans('Students_trans.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>