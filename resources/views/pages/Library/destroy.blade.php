<div class="modal fade" id="delete_book{{$book->id}}" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('library.destroy','test')}}" method="post">
            @method('delete')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;"
                        class="modal-title" id="exampleModalLabel">{{trans('subjects_trans.Delete_Book')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 style="font-family: 'Cairo', sans-serif;"> 
                        {{ trans('My_Classes_trans.Warning_Grade') }} 
                        {{-- <span class="text-danger">{{$book->title}}</span> --}}
                    </h4>
                    <input type="hidden" name="id" value="{{$book->id}}">
                    <input type="hidden" name="file_name" value="{{$book->file_name}}">
                    <hr>
                    <h6 style="font-family: 'Cairo', sans-serif;">  
                        <span class="text-danger">
                            ( 
                            {{$book->title}} - 
                            {{$book->grade->Name}} - 
                            {{$book->classroom->Name_Class}} - 
                            {{$book->section->Name_Section}} - 
                            {{$book->teacher->Name}} 
                            ) 
                        </span>
                    </h6> 
                </div>
                
                <div class="modal-footer">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                        <button type="submit"
                                class="btn btn-danger">{{ trans('subjects_trans.delete') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>