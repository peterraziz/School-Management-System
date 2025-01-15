<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_receipt{{$payment_student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    <span class="text-danger"> 
                        {{ trans('accounts_trans.delete_refund_of_fees') }}
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('Payment_students.destroy','test')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{$payment_student->id}}">
                    
                    <h4 style="font-family: 'Cairo', sans-serif;">
                        <span class="text-danger">
                        {{ trans('accounts_trans.delete_confirm') }}
                        </span>
                    </h4> <hr>
                
                    <h6 style="font-family: 'Cairo', sans-serif;">
                        <span class="text-danger">
                            ( 
                            {{$payment_student->student->name}} - 
                            {{$payment_student->student->grade->Name}} - 
                            {{$payment_student->student->classroom->Name_Class}} - 
                            {{$payment_student->student->section->Name_Section}} 
                            )
                        </span> <br>
                            {{$payment_student->amount}} - 
                            {{$payment_student->description}} 
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