<button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showformadd" type="button">{{ trans('Parent_trans.add_parent') }}</button> <br><br><br>
<div class="table-responsive">
    
    <table id="datatablee" {{-- id="datatable" --}} class="table table-hover table-sm table-bordered p-0" data-page-length="50"
        style="text-align: center">
        <thead>
        <tr class="table-success">
            <th>#</th>
            <th>{{ trans('Parent_trans.Parents_Name') }}</th>
            <th>{{ trans('Parent_trans.Email') }}</th>
            <th>{{ trans('Parent_trans.National_ID_Father') }}</th>
            <th>{{ trans('Parent_trans.Passport_ID_Father') }}</th>
            <th>{{ trans('Parent_trans.Phone_Father') }}</th>
            <th>{{ trans('subjects_trans.Job_title') }}</th>
            <th>{{ trans('Parent_trans.Processes') }}</th>
        </tr>
        </thead>
        <tbody>
        @php $i = 0; @endphp
        @foreach ($my_parents as $my_parent)
            <tr>
                @php $i++; @endphp
                <td>{{ $i }}</td>
                <td>{{ $my_parent->Name_Father }} <hr> {{ $my_parent->Name_Mother }} </td>
                <td>{{ $my_parent->email }}</td>
                <td>{{ $my_parent->National_ID_Father }} <hr> {{ $my_parent->National_ID_Mother }} </td>
                <td>{{ $my_parent->Passport_ID_Father }} <hr> {{ $my_parent->Passport_ID_Mother }} </td>
                <td>{{ $my_parent->Phone_Father }} <hr> {{ $my_parent->Phone_Mother }} </td>
                <td>{{ $my_parent->Job_Father }} <hr> {{ $my_parent->Job_Mother }} </td>
                <td>
                    <button wire:click="edit({{ $my_parent->id }})" title="{{ trans('Grades_trans.Edit') }}"
                        class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>
                    </button>
                
                    <button type="button" class="btn btn-danger btn-sm" 
                        wire:click="delete({{ $my_parent->id }})" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </table>
</div>
