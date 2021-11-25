@extends('layouts.app')

@section('content')
<br><br>
<button id="btn_add">Add</button>
<button id="btn_view">View</button>

<div id="div_content">
<h2>Add Form</h2>
<form id="addNewFeeType_Form" action="" class="smart-form">

    <label class="control-label">Name<span style="color:red; font-size:14px;">*</span></label>
    <label class="input">
        <input id="name" type="text" autofocus>
    </label>
    <br>

    <label class="control-label">Display Name<span style="color:red; font-size:14px;">*</span></label>
    <label class="input">
        <input id="dname" type="text">
        
    </label>
    <br>

    <label class="control-label">Code<span style="color:red; font-size:14px;">*</span></label>
    <label class="input">
        <input id="code" type="text">
    </label>
    <br>

    <button id="btn_save" type="submit">
    Save
    </button>
    <button id="btn_cancel" type="button">
    Cancel
    </button>


</form>
@endsection
@section('script')
<!-- end widget content -->
<script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/sweetalert2.all.min.js') }}"></script>

<script>


/*
|--------------------------------------------------------------------------
| Page Refresh
|--------------------------------------------------------------------------
*/
$(document).ready(function(){

	// AJAX SETUP CSRF TOKEN
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

  $(document).on('click', '#btn_view', function(e){
		e.preventDefault();
		$.ajax({
			type: "get",
			url: "{{ url('/refresh') }}",
			success:function(data){
				$('#div_content').html(data);
			}
		});
	});
	
	$(document).on('click', '#btn_cancel', function(e){
		e.preventDefault();
		$.ajax({
			type: "get",
			url: "{{ url('/refresh') }}",
			success:function(data){
				$('#div_content').html(data);
			}
		});
	});


    /*
    |--------------------------------------------------------------------------
    | Page Add
    |--------------------------------------------------------------------------
    */
    $(document).on('click', '#btn_add', function(e){
        e.preventDefault();
      $.ajax({
        type: "get",
        url: "{{ url('/addForm') }}",
        success:function(data){
          $('#div_content').html(data);
          $('#name').focus();
        },
      });

    });
     // SAVE DATA

     $(document).on('click', '#btn_save', function(e){
        e.preventDefault();
  
        $.ajax({
            url : "{{ url('/add')}}",
            type : "post",
            data : {
                _token : "{{csrf_token()}}",
                name : $('#name').val(),
                dname : $('#dname').val(),
                code : $('#code').val()
            },
            success : function(data){
                $('#div_content').html(data);
            },
            error : function (err){
                console.log(err);
            } 
          
        });
    });

    //edit form 
    $(document).on('click', '.edit-fee', function(e){
        e.preventDefault();

        var id = $(this).data('id');
        $.ajax({
            url: "{{ url('/editForm') }}",
            type: "GET",
            data: {
                id: id,
            },
            success: function(response){
                $('#div_content').html(response);
            },
            error: function(err){
            }
        });
    });


	/*
	|--------------------------------------------------------------------------
	| C-R-U-D
	|--------------------------------------------------------------------------


	$(document).on('click', '#btn_view', function(e){
		e.preventDefault();
		dataRefresh();
	});

	$(document).off('click', '#btn_add');
	$(document).on('click', '#btn_add', function(e){
			e.preventDefault();
			dataAdd();
	});
  	*/

});	

</script>
@endsection
