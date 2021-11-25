<table id="datatable_student_feetype" class="table table-striped table-bordered table-hover dataTable no-footer" width="100%">

    <thead>
        <tr>
            <th class="hasinput" style="width:5%;">
                <input type="text" class="form-control" placeholder="{{ __('a_data.filter')}} {{ __('a_data.id') }}" />
            </th>
            <th class="hasinput" >
                <input type="text" class="form-control" placeholder="{{ __('a_data.filter')}} {{ __('a_data.name') }}" />
            </th>
            <th class="hasinput" >
                <input type="text" class="form-control" placeholder="{{ __('a_data.filter')}} {{ __('a_data.dname') }}" />
            </th>
            <th class="hasinput" >
                <input type="text" class="form-control" placeholder="{{ __('a_data.filter')}} {{ __('fee_type.code') }}" />
            </th>
            <th class="hasinput" >
                <input type="text" class="form-control" placeholder="{{ __('a_data.filter')}} {{ __('a_data.rollback') }}" />
            </th>
            
        </tr>
        <tr>
            <th class="text-center" data-class="expand">{{ __('a_data.id')}}</th>
            <th >{{ __('a_data.name') }}</th>
            <th >{{ __('a_data.dname') }}</th>
            <th >{{ __('fee_type.code') }}</th>
            <th class="text-center">{{ __('a_data.rollback')}}</th>
        </tr>
    </thead>
    <tbody>    
        @foreach ($user['page_data'] as $data)
            <tr>
                <td class="text-center">{{ $data->id }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->dname }}</td>
                <td>{{ $data->code }}</td>
                <td width="5%" align="center">
                    <input class='tgl tgl-skewed tgl-skewed-xedit_fee_type_askR' id='record_deleted-{{$data->id}}' type='checkbox' <?php echo ($data->record_deleted == 0 ? 'checked' : ''); ?> />
                    <label class='tgl-btn' data-tg-off='{{ __('a_data.no') }}' data-tg-on='{{ __('a_data.yes') }}' for='record_deleted-{{$data->id}}' />
                </td>
            </tr>
        @endforeach        
    </tbody>

</table>