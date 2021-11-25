<?php
    $textAlign = "text-align:left;"; 
    $textAlignPadding = "text-align:left; padding-left:10px;"; 
?>
@if(\Session::get('locale') == 'pk')
<?php
    $textAlign = "text-align:right;"; 
    $textAlignPadding = "text-align:right; padding-right:10px;";
?>
<html style="direction: rtl;">
@else
<html>
@endif

<head>
    <style>
    *{
        @if(\Session::get('locale') == 'pk')
        font-family: xbriyaz;
        @else
        font-family: "Open Sans",Helvetica,Sans-Serif !important;
        @endif
    }
    .border-head{
        height: 40px;
        background-color: lightcyan;
        border: 1px solid black;
    }
    .border-row{
        height: 40px;
        border: 1px solid black;
    }
    .highlight-row{
        background-color: lightcyan;
    }
    </style>
</head>

@if(\Session::get('locale') == 'pk')
<body dir="rtl">
@else
<body>
@endif

    <h2 lang="ur" style="text-align:center;">{{ __('fee_type.fee_type_report') }}</h2>

    
    <table lang="ur" style="border-collapse:collapse; table-layout:fixed; width:100%;">

        <thead>
            <tr>
                <th class="border-head" style="text-align:center; width:7%;">{{ __('a_data.id') }}</th>
                <th class="border-head" style="{!! $textAlignPadding !!} width:10%;">{{ __('a_data.name')}}</th>
                <th class="border-head" style="{!! $textAlignPadding !!} width:10%;">{{ __('a_data.dname') }}</th>
                <th class="border-head" style="{!! $textAlignPadding !!} width:10%;">{{ __('fee_type.code')}}</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($user['page_data'] as $data)
                <tr>
                    <td class="border-row" style="text-align:center;">{{ $data->id }}</td>
                    <td class="border-row" style="{!! $textAlignPadding !!}">{{ $data->name }}</td>
                    <td class="border-row" style="{!! $textAlignPadding !!}">{{ $data->dname }}</td>
                    <td class="border-row" style="{!! $textAlignPadding !!}">{{ $data->code }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>


</body>
</html>