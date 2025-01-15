<!-- Deleted Information Student -->
<div class="modal fade" id="Delete_Fee_invoice{{$Fee_invoice->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{trans('accounts_trans.delete_invoice')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('Fees_Invoices.destroy', 'test')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{$Fee_invoice->id}}">
                    <h4 style="font-family: 'Cairo', sans-serif;">
                        <span class="text-danger">{{trans('accounts_trans.delete_confirm')}}</span>
                    </h4> <hr>
                    
                    <!-- Display student information directly from Fee_invoice -->
                    <h6 style="font-family: 'Cairo', sans-serif;">
                    <span class="text-danger">
                        (
                        {{ $Fee_invoice->student->name }} - 
                        {{ $Fee_invoice->student->grade->Name }} - 
                        {{ $Fee_invoice->student->classroom->Name_Class }}
                        )
                    </span> 
                    </h6>
                    
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Students_trans.Close')}}</button>
                        <button class="btn btn-danger">{{trans('Students_trans.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
