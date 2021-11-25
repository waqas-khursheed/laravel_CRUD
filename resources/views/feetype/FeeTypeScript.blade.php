<?php
    $workplace = "workplace-feetype";
    $pageName = "FeeType";
    $pageID = $workplace."-".$pageName;

?>



/*
|--------------------------------------------------------------------------
| DataTable setup for Student Fee Type
|--------------------------------------------------------------------------
*/
function DatatableStudentFeeType(){
    <?php 
        $datatableID = 'datatable_student_feetype';
    ?>
    /* BASIC ;*/
    var responsiveHelper_{!! $datatableID !!} = undefined;
    
    var breakpointDefinition = {
        tablet : 1024,
        phone : 480
    };
    /* END BASIC */
    
    
    /* COLUMN FILTER  */
    var otable = $('#{!! $datatableID !!}').DataTable({
        @if($user['rights'][0]->can_export == 1)
        "sDom": "<'dt-toolbar'{!! DT_TOOLS_2_FX !!}r>"+
            "t"+
            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
        "buttons": [{!! DT_BUTTONS !!}],
        @else
        "sDom": "<'dt-toolbar'{!! DT_TOOLS_2_FH !!}r>"+
            "t"+
            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
        @endif
        "autoWidth" : true,
        "preDrawCallback" : function() {
            // Initialize the responsive datatables helper once.
            if (!responsiveHelper_{!! $datatableID !!}) {
                responsiveHelper_{!! $datatableID !!} = new ResponsiveDatatablesHelper($('#{!! $datatableID !!}'), breakpointDefinition);
            }
        },
        "rowCallback" : function(nRow) {
            responsiveHelper_{!! $datatableID !!}.createExpandIcon(nRow);
        },
        "drawCallback" : function(oSettings) {
            responsiveHelper_{!! $datatableID !!}.respond();
        }
    
    });
    
    <?php /*
    // custom toolbar
    $("div.toolbar").html('<div class="text-right"><img src="img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
    */ ?>
            
    // Apply the filter
    $("#{!! $datatableID !!} thead th input[type=text]").on( 'keyup change', function () {
        otable
            .column( $(this).parent().index()+':visible' )
            .search( this.value )
            .draw();
    } );
    /* END COLUMN FILTER */  
    
    $('#{!! $datatableID !!} tbody').on('click', 'tr', function () {
        $("#{!! $datatableID !!} tbody tr").removeClass('an-row_selected');
        var data = otable.row( this ).data();
        var id = data[0];
        $(this).addClass('an-row_selected');
    });
}



function DatatableStudentFeeTypeSimple(){
    <?php 
        $datatableID = 'datatable_student_feetype';
    ?>
 /* BASIC ;*/
    var responsiveHelper_{!! $datatableID !!} = undefined;
    
    var breakpointDefinition = {
        tablet : 1024,
        phone : 480
    };
    /* END BASIC */
    
    
    /* COLUMN FILTER  */
    var otable = $('#{!! $datatableID !!}').DataTable({
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
                "t"+
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
        "autoWidth" : true,
        "preDrawCallback" : function() {
            // Initialize the responsive datatables helper once.
            if (!responsiveHelper_{!! $datatableID !!}) {
                responsiveHelper_{!! $datatableID !!} = new ResponsiveDatatablesHelper($('#{!! $datatableID !!}'), breakpointDefinition);
            }
        },
        "rowCallback" : function(nRow) {
            responsiveHelper_{!! $datatableID !!}.createExpandIcon(nRow);
            //$.fn.editable.defaults.mode = 'inline';
			$.fn.editable.defaults.mode = 'popup';
			
			$('.xedit_text').editable({
                validate: function (value) {
		            if ($.trim(value) == '')
                        return '{{ __('a_data.required') }}';
                },
                params:{
                    d: "main",
                    t: "fee_type",
                    m: {{STUDENT_FEE_TYPE}}
                },
                url: '{{ url("/edit_xeditable") }}',
            });
           

                   
            $(document).off('click', '.tgl-skewed-xedit');
            $(document).on('click', '.tgl-skewed-xedit', function(){
				var data = $(this).attr('id');
				var id = data.substring(data.indexOf("-")+1, data.length);
				var name = data.substring(0, data.indexOf("-"));
				var val = 0;
				if ($(this).is(':checked')) {
					val = 1;
				}
				$.ajax({
					url: "{{ url("/edit_xeditable_10") }}",
					type: "post",
					data:{
						pk: id,
						name: name,
                        value: val,
                        d: "main",
                        t: "fee_type",
                        m: {{STUDENT_FEE_TYPE}}
					}
				});
            });
 
            $(document).off('click', '.tgl-skewed-xedit_fee_type_askD');
            $(document).on('click', '.tgl-skewed-xedit_fee_type_askD', function(){
                var thisButton = $(this);
                var data = $(this).attr('id');
                var id = data.substring(data.indexOf("-")+1, data.length);
                var name = data.substring(0, data.indexOf("-"));
                var val = 0;
                if ($(this).is(':checked')) {
                    val = 1;
                }
                var functionOK = function(){
                    $.ajax({
                        url: "{{ url("/edit_xeditable_10") }}",
                        type: "post",
                        data:{
                            pk: id,
                            name: name,
                            value: val,
                            d: "main",
                            t: "fee_type",
                            m: {{STUDENT_FEE_TYPE}}
                        }
                    });
                }
                var cancelDialog = function(){
                    thisButton.prop('checked', !(thisButton.is(':checked')));
                }

                $.confirm({
                    title: "{{ __('a_data.r_u_sure') }}",
                    content: "{{ __('a_data.delete') }}",
                    buttons: {
                        "{{ __('a_data.yes') }}": function () {
                            functionOK()
                        },
                        "{{ __('a_data.no') }}": function () {
                            cancelDialog()
                        }
                    }
                });
            });
            
            $(document).off('click', '.tgl-skewed-xedit_fee_type_askR');
            $(document).on('click', '.tgl-skewed-xedit_fee_type_askR', function(){
                var thisButton = $(this);
                var data = $(this).attr('id');
                var id = data.substring(data.indexOf("-")+1, data.length);
                var name = data.substring(0, data.indexOf("-"));
                var val = 1;
                if ($(this).is(':checked')) {
                    val = 0;
                }
                var functionOK = function(){
                    $.ajax({
                        url: "{{ url("/edit_xeditable_10") }}",
                        type: "post",
                        data:{
                            pk: id,
                            name: name,
                            value: val,
                            d: "main",
                            t: "fee_type",
                            m: {{STUDENT_FEE_TYPE}}
                        }
                    });
                }
                var cancelDialog = function(){
                    thisButton.prop('checked', !(thisButton.is(':checked')));
                }

                $.confirm({
                    title: "{{ __('a_data.r_u_sure') }}",
                    content: "{{ __('a_data.rollback') }}",
                    buttons: {
                        "{{ __('a_data.yes') }}": function () {
                            functionOK()
                        },
                        "{{ __('a_data.no') }}": function () {
                            cancelDialog()
                        }
                    }
                });
			});

        },
        "drawCallback" : function(oSettings) {
            responsiveHelper_{!! $datatableID !!}.respond();
        }
    
    });
    
    // Apply the filter
    $("#{!! $datatableID !!} thead th input[type=text]").on( 'keyup change', function () {
        otable
            .column( $(this).parent().index()+':visible' )
            .search( this.value )
            .draw();
    } );
    /* END COLUMN FILTER */  
    
    $('#{!! $datatableID !!} tbody').on('click', 'tr', function () {
        $("#{!! $datatableID !!} tbody tr").removeClass('an-row_selected');
        var data = otable.row( this ).data();
        var id = data[0];
        $(this).addClass('an-row_selected');
    });
}
// end DataTable setup for Roles


/*
|--------------------------------------------------------------------------
| Page Refresh
|--------------------------------------------------------------------------
*/
function dataRefresh(){
    $.ajax({
        type: "get",
        url: "{{ url('/student/fee/type/register/refresh') }}",
        success:function(data){
            $('#diva-{!! $pageID !!}').html(data);
            DatatableStudentFeeType();
        }
    });
}

/*
|--------------------------------------------------------------------------
| Page Add
|--------------------------------------------------------------------------
*/
function dataAdd(){
    $.ajax({
        type: "get",
        url: "{{ url('/student/fee/type/register/addForm') }}",
        success:function(data){
            $('#diva-{!! $pageID !!}').html(data);
            $('#addNewFeeType_name').focus();

            $(document).off('click', '#addNewFeeType_AddBTN');
            $(document).on('click', '#addNewFeeType_AddBTN', function(e){
                e.preventDefault();

                var name = $('#addNewFeeType_name').val();
                var dname = $('#addNewFeeType_dname').val();
                var code = $('#addNewFeeType_code').val();
                

                function Errors(errors){
                    var focusField = false;
                    $('#addNewFeeType_name_msg').removeClass('has-error');
                    $('#addNewFeeType_dname_msg').removeClass('has-error');
                    $('#addNewFeeType_code_msg').removeClass('has-error');
                   
                    $('#addNewFeeType_name_showMsg').html('<i class="form-control-feedback glyphicon glyphicon-ok" data-bv-icon-for="title"></i>');
                    $('#addNewFeeType_dname_showMsg').html('<i class="form-control-feedback glyphicon glyphicon-ok" data-bv-icon-for="title"></i>');
                    $('#addNewFeeType_code_showMsg').html('<i class="form-control-feedback glyphicon glyphicon-ok" data-bv-icon-for="title"></i>');
                  

                    $.each(errors, function(key, value){

                        if(value.indexOf('{{ __('a_data.name') }}') == 0){
                            $('#addNewFeeType_name_msg').addClass('has-error');
                            $('#addNewFeeType_name_showMsg').html('<i class="form-control-feedback glyphicon glyphicon-remove" data-bv-icon-for="title"></i><small class="help-block" data-bv-for="title" data-bv-result="INVALID">'+value+'</small>');
                            if(!focusField){$('#addNewFeeType_name').focus();focusField = true;}

                        }else if(value.indexOf('{{ __('a_data.dname') }}') == 0){
                            $('#addNewFeeType_dname_msg').addClass('has-error');
                            $('#addNewFeeType_dname_showMsg').html('<i class="form-control-feedback glyphicon glyphicon-remove" data-bv-icon-for="title"></i><small class="help-block" data-bv-for="title" data-bv-result="INVALID">'+value+'</small>');
                            if(!focusField){$('#addNewFeeType_dname').focus();focusField = true;}

                        }else if(value.indexOf('{{ __('fee_type.code') }}') == 0){
                            $('#addNewFeeType_code_msg').addClass('has-error');
                            $('#addNewFeeType_code_showMsg').html('<i class="form-control-feedback glyphicon glyphicon-remove" data-bv-icon-for="title"></i><small class="help-block" data-bv-for="title" data-bv-result="INVALID">'+value+'</small>');
                            if(!focusField){$('#addNewFeeType_code').focus();focusField = true;}

                        }
                    });
                };

                var errFound = false;
                var errors = [];
                if(name == ''){
                    errors.push("{!! __('a_data.req_name') !!}");
                    errFound = true;
                }
                if(dname == ''){
                    errors.push("{!! __('a_data.req_dname') !!}");
                    errFound = true;
                }
                if(code == ''){
                    errors.push("{!! __('a_data.req_code') !!}");
                    errFound = true;
                }
                if(errFound){Errors(errors);return;}

                $.ajax({
                    url: "{{ url('/student/fee/type/register/add') }}",
                    type: "post",
                    data: {

                        name: name,
                        dname: dname,
                        code: code,   
                    },
                    success:function(data){
                        dataRefresh();
                    },
                    error:function(err){
                        console.log(err);
                        var msg = err.responseJSON.message;
                        var errors = err.responseJSON.errors;
                        Errors(errors);
                    }
                });
            });
            
            $(document).off('click', '#addNewFeeType_CancelBTN');
            $(document).on('click', '#addNewFeeType_CancelBTN', function(e){
                e.preventDefault();
                dataRefresh();
            });
        }
    });
}

/*
|--------------------------------------------------------------------------
| Page Update
|--------------------------------------------------------------------------
*/
function dataUpdate(){
    $.ajax({
        type: "get",
        url: "{{ url('/student/fee/type/register/editForm') }}",
        success:function(data){
            $('#diva-{!! $pageID !!}').html(data);
            DatatableStudentFeeTypeSimple();
        }
    });
}


/*
|--------------------------------------------------------------------------
| Page Delete
|--------------------------------------------------------------------------
*/
function dataDelete(){
    $.ajax({
        type: "get",
        url: "{{ url('/student/fee/type/register/deleteForm') }}",
        success:function(data){
            $('#diva-{!! $pageID !!}').html(data);
            DatatableStudentFeeTypeSimple();
        }
    });
}


/*
|--------------------------------------------------------------------------
| Page Rollback
|--------------------------------------------------------------------------
*/
function dataRollback(){
    $.ajax({
        type: "get",
        url: "{{ url('/student/fee/type/register/rollbackForm') }}",
        success:function(data){
            $('#diva-{!! $pageID !!}').html(data);
            DatatableStudentFeeTypeSimple();
        }
    });
}

/*
|--------------------------------------------------------------------------
| Get PDF AJAX
|--------------------------------------------------------------------------
*/
function getReport(ID){
    $.ajax({
        type: "get",
        data: {
            report : ID
        },
        url: "{{ url('/student/fee/type/register/PDF') }}",
        success:function(data){
            $('#article-feetypePDF').show();
            $('#divb-{!! $pageID !!}-PDF').html(data);
        }
    });
}

/*
|--------------------------------------------------------------------------
| Report Buttons
|--------------------------------------------------------------------------
*/
$(document).off('click', '#{!! $pageID !!}-print');
$(document).on('click', '#{!! $pageID !!}-print', function(e){
    e.preventDefault();
    getReport(1);
});

$(document).off('click', '#{!! $pageID !!}-1');
$(document).on('click', '#{!! $pageID !!}-1', function(e){
    e.preventDefault();
    getReport(1);    
});

$(document).off('click', '#{!! $pageID !!}-2');
$(document).on('click', '#{!! $pageID !!}-2', function(e){
    e.preventDefault();
    getReport(2);
});



/*

/*
|--------------------------------------------------------------------------
| C-R-U-D
|--------------------------------------------------------------------------
*/
$(document).off('click', '#{!! $pageID !!}-refresh');
$(document).on('click', '#{!! $pageID !!}-refresh', function(e){
    e.preventDefault();
    dataRefresh();
});

$(document).off('click', '#{!! $pageID !!}-add');
$(document).on('click', '#{!! $pageID !!}-add', function(e){
    e.preventDefault();
    /*
    * COLOR PICKER
    */
	loadScript("<?php echo APP_ASSET; ?>/js/plugin/colorpicker/bootstrap-colorpicker.min.js", dataAdd);
});

$(document).off('click', '#{!! $pageID !!}-edit');
$(document).on('click', '#{!! $pageID !!}-edit', function(e){
    e.preventDefault();
    dataUpdate();
});

$(document).off('click', '#{!! $pageID !!}-delete');
$(document).on('click', '#{!! $pageID !!}-delete', function(e){
    e.preventDefault();
    dataDelete();
});

$(document).off('click', '#{!! $pageID !!}-rollback');
$(document).on('click', '#{!! $pageID !!}-rollback', function(e){
    e.preventDefault();
    dataRollback();
});

dataRefresh();
