<div class="modal fade" id="delete_exam{{$question->id}}" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('questions.destroy','test')}}" method="post">
            {{method_field('delete')}}
            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;"
                        class="modal-title" id="exampleModalLabel">
                        {{trans('subjects_trans.delete_question')}}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">
                    <h4 style="font-family: 'Cairo', sans-serif;"> 
                        {{ trans('My_Classes_trans.Warning_Grade') }} 
                    </h4>
                    <input type="hidden" name="id" value="{{$question->id}}">
                    <hr>
                    <h6 style="font-family: 'Cairo', sans-serif;">  
                        <span class="text-danger">
                            ( 
                            {{$question->title}} : 
                            {{$question->right_answer}}
                            )
                            <br>
                            {{$question->score}} - 
                            {{$question->quiz->name}} 
                        </span>
                    </h6>
                </div>
            
                <div class="modal-footer">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                        <button type="submit" class="btn btn-danger">{{trans('subjects_trans.delete')}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>