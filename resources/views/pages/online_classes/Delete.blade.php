<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_receipt{{$online_classe->meeting_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{trans('subjects_trans.delete_Lecture')}} 
                    {{-- {{$online_classe->topic}} --}}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('online_classes.destroy','test')}}" method="post">
                    @csrf
                    @method('DELETE')
                
                    <input type="hidden" name="id" value="{{$online_classe->id}}">
                    <input type="hidden" name="meeting_id" value="{{$online_classe->meeting_id}}"> 
                    <h4 style="font-family: 'Cairo', sans-serif;">
                        {{trans('subjects_trans.delete_Lecture_confirm')}}
                    </h4> 
                    <hr>
                    <h6 style="font-family: 'Cairo', sans-serif;">  
                        <span class="text-danger">
                            ( 
                            {{$online_classe->topic}} - 
                            {{$online_classe->grade->Name}} - 
                            {{$online_classe->classroom->Name_Class}} - 
                            {{$online_classe->section->Name_Section}} - 
                            {{-- {{$online_classe->user->name}} --}}
                            {{$online_classe->created_by}}
                            ) 
                        </span>
                    </h6> 
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Students_trans.Close')}}</button>
                        <button  class="btn btn-danger">{{trans('subjects_trans.delete')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>