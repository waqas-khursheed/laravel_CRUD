@extends('layouts.app')
@section('content')
<!-- content area -->
<form id="form-agenda">
    <section class="add-admin-user-section shecdule-content create-agenda">
        <div class="container">


            <h1>Create Agenda</h1>
            <div class="row">
                <div class="col-xl-3">
                    <div class="left-tabs-bar line-k">
                        <ul class="tabs">(
                            <li><a href="#">ADD EVENT</a></li>
                        </ul>
                    </div>
                </div>



                <div class="col-xl-4" id="div-agenda-form">

                    <div class="add-user-section register-container line-k">

                        <h2>New Event</h2>
                        <h6>ENTER EVENT DETAILS BELOW</h6>

                        <span id="err-title" class="invalid-feedback" style="display: block" role="alert">
                            <strong></strong>
                        </span>

                        <legend>
                            <input type="text" name="title" value="">
                            <label class="bold-label">TITLE</label>
                        </legend>

                        <span id="err-description" class="invalid-feedback" style="display: block" role="alert">
                            <strong></strong>
                        </span>
                        <legend>
                            <input type="text" name="description" value="">
                            <label>SUBTITLE</label>
                        </legend>


                        <span id="err-date" class="invalid-feedback" style="display: block" role="alert">
                            <strong></strong>
                        </span>
                        <legend>
                            <input type="text" name="date" value="" id="datepicker5">
                            <div class="calender-icon"></div>
                            <label>DATE</label>
                        </legend>


                        <legend>
                            <div class="row">
                                <div class="col-xl-2"></div>
                                <div class="col-xl-5">

                                    <div class="pulse-custom-select">

                                        <span id="err-time_start" class="invalid-feedback" style="display: block" role="alert">
                                            <strong></strong>
                                        </span>

                                        <legend>
                                            <select name="time_start">
                                                <option value="09:00:00">9:00 am</option>
                                                <option value="09:30:00">9:30 am</option>
                                                <option value="10:00:00">10:00 am</option>
                                            </select>
                                            <span class="select-icon"></span>
                                            <label>START TIME</label>
                                        </legend>
                                    </div>
                                </div>

                                <div class="col-xl-5">
                                    <div class="pulse-custom-select">
                                        <span id="err-time_end" class="invalid-feedback" style="display: block" role="alert">
                                            <strong></strong>
                                        </span>
                                        <legend>
                                            <select name="time_end">
                                            <option value="09:30:00">9:30 am</option>
                                                <option value="10:00:00">10:00 am</option>
                                                <option value="10:30:00">10:30 am</option>
                                                <option value="11:00:00">11:00 am</option>
                                                <option value="11:30:00">11:30 am</option>
                                                <option value="12:00:00">12:00 pm</option>
                                                <option value="12:30:00">12:30 pm</option>
                                                <option value="13:00:00">1:00 pm</option>
                                                <option value="13:30:00">1:30 pm</option>
                                                <option value="14:00:00">2:00 pm</option>
                                                <option value="14:30:00">2:30 pm</option>
                                                <option value="15:00:00">3:00 pm</option>
                                                <option value="15:30:00">3:30 pm</option>
                                                <option value="16:00:00">4:00 pm</option>
                                            </select>
                                            <span class="select-icon"></span>
                                            <label>END TIME</label>
                                        </legend>
                                    </div>
                                </div>
                            </div>
                        </legend>
                        <div class="pulse-custom-select">
                            <span id="err-time_zone" class="invalid-feedback" style="display: block" role="alert">
                                <strong></strong>
                            </span>
                            <legend>
                                <select name="time_zone">
									<option value="">Select Time Zone</option>
                                    <option value="EST">EST</option>
                                    <option value="CST">CST</option>
                                    <option value="MST">MST</option>
                                    <option value="PST">PST</option>
                                </select>
                                <span class="select-icon"></span>
                                <label>TIME ZONE (all times based on)</label>
                            </legend>
                        </div>

                        <div class="pulse-custom-select">

                            <span id="err-theater" class="invalid-feedback" style="display: block" role="alert">
                                <strong></strong>
                            </span>

                            <legend>
                                <select name="theater">
                                    <option value="">Select Location</option>
                                    <option>Theater A</option>
                                    <option>Theater B</option>
                                    <option>Theater C</option>
                                </select>

                                <span class="select-icon"></span>
                                <label>LOCATION</label>
                            </legend>
                        </div>

                        <div class="pulse-custom-select">

                            <span id="err-event_type" class="invalid-feedback" style="display: block" role="alert">
                                <strong></strong>
                            </span>

                            <legend>
                                <select name="event_type">
									<option value="">Select Event Type</option>
                                    <option value="Presentation">Presentation</option>
                                    <option value="Networking">Networking</option>
                                </select>

                                <span class="select-icon"></span>
                                <label>EVENT TYPE</label>
                            </legend>
                        </div>

                        <div class="links-group">
                            <input id="btn-agenda-add" type="submit" value="ADD EVENT TO AGENDA" name="">
                        </div>
                    </div>
                </div>        


                               <div class="col-xl-5">
                    <div class="agenda-content">
                        <header>
                            <h2>FULL AGENDA</h2></header>
                      <div class="scrollbar-inner">
                        <div class="agenda-c" id="div-agenda">

                            @foreach($allAgenda as $agenda)
                            <div class="row">
                                <div class="col-sm-4">
                                    <h5>{{ $agenda->title }}</h5>
                                    <p>{{ $agenda->description }}</p>
                                </div>
                                <div class="col-sm-3">
                                    <h6><strong>{{ $agenda->theater }}</strong></h6>

                                </div>
                                <div class="col-sm-3">
                                    <p class="date">{{ date_format(date_create($agenda->date),"F dS") }}</p>
                                    <p class="duration-time">{{ date ('h:ia',strtotime($agenda->time_start)) }} - {{ date ('h:ia',strtotime($agenda->time_end)) }}</p>
                                </div>
                                <div class="col-sm-2">
                                    <div class="edit-delete">
                                        <a href="#" class="edit-agenda" data-id="{{ $agenda->id }}">Edit</a> / <a href="#" class="delete-agenda" data-id="{{ $agenda->id }}">Delete</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    </div>
                </div>            
            </div>
             
            </div>
            <div class="reports-small-tabs button-agenda pull-right" style="clear:both;">
                <a href="#" class="buttonfx angleinleft" id="btn-publish-agenda"><span class="button-excell">Publish</span></a>   
                </div>
        </div>
        
    </section>
</form>
@endsection


@section('script')
<script>

function hideAllErrors(){
    $('#err-title').hide();
    $('#err-description').hide();
    $('#err-date').hide();
    $('#err-time_start').hide();
    $('#err-time_end').hide();
    $('#err-time_zone').hide();
    $('#err-theater').hide();
    $('#err-event_type').hide();
}

hideAllErrors();

$(document).ready(function(){

    // AJAX SETUP CSRF TOKEN
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // SAVE DATA

    $(document).on('click', '#btn-agenda-add', function(e){
        e.preventDefault();
        hideAllErrors();

        $.ajax({
            url: "{{ url('/admin/create/agenda') }}",
            type: "POST",
            data: $('#form-agenda').serialize(),
            success: function(response){
                var result = $.parseJSON(response);
                $('#div-agenda-form').html(result.form);
                $('#div-agenda').html(result.list);
            },
            error: function(err){
                var msg = err.responseJSON.message;
                var errors = err.responseJSON.errors;
                $.each(errors, function(key, value){
                    $('#err-'+key).html('<strong>'+value+'</strong>');
                    $('#err-'+key).show();
                });
            }
        });
    });
    
    
    /*
   
    $(document).on('click', '#btn-agenda-add', function(e){
        e.preventDefault();
        hideAllErrors();
        var thisDate = $('#datepicker5').val();
        var title =  $('#agenda-title').val();
        var description = $('#agenda-description').val();
        var theater = $('#agenda-theater option:selected').val();
        var time_start = $('#agenda-time_start option:selected').val();
        var time_end = $('#agenda-time_end option:selected').val();
        var time_zone = $('#agenda-time_zone option:selected').val();
        var event_type = $('#agenda-event_type option:selected').val();

        $.ajax({
            url: "{{ url('/admin/create/agenda') }}",
            type: "POST",
            data: {
                title: title,
                description: description,
                theater: theater,
                date: thisDate.substring(6,10) + '-' + thisDate.substring(0,2) + '-' + thisDate.substring(3,5),
                time_start: time_start,
                time_end: time_end,
                time_zone: time_zone,
                event_type: event_type,
            },
            success: function(response){
                var result = $.parseJSON(response);
                $('#div-agenda-form').html(result.form);
                $('#div-agenda').html(result.list);
                
            },
            error: function(err){
                var msg = err.responseJSON.message;
                var errors = err.responseJSON.errors;
                $.each(errors, function(key, value){
                    $('#err-'+key).html('<strong>'+value+'</strong>');
                    $('#err-'+key).show();
                });
            }
        });
    });
    */
  

    //GET EDIT FORM 

    $(document).on('click', '.edit-agenda', function(e){
        e.preventDefault();
        hideAllErrors();

        var id = $(this).data('id');
        $.ajax({
            url: "{{ url('/admin/edit/agenda') }}",
            type: "GET",
            data: {
                id: id,
            },
            success: function(response){
                $('#div-agenda-form').html(response);
            },
            error: function(err){
            }
        });
    });

    // EDIT DATA
    
    $(document).on('click', '#btn-agenda-edit', function(e){
        e.preventDefault();
        hideAllErrors();

        var id = $('#agenda-record-id').val();
        var thisDate = $('#datepicker5').val();
        $.ajax({
            url: "{{ url('/admin/edit/agenda') }}",
            type: "POST",
            data: {
                id: id,
                title: $('#agenda-title').val(),
                description: $('#agenda-description').val(),
                theater: $('#agenda-theater option:selected').val(),
                date: thisDate.substring(6,10) + '-' + thisDate.substring(0,2) + '-' + thisDate.substring(3,5),
                time_start: $('#agenda-time_start option:selected').val(),
                time_end: $('#agenda-time_end option:selected').val(),
                time_zone: $('#agenda-time_zone option:selected').val(),
                event_type: $('#agenda-event_type option:selected').val(),
            },
            success: function(response){
                var result = $.parseJSON(response);
                $('#div-agenda-form').html(result.form);
                $('#div-agenda').html(result.list);
            },
            error: function(err){
                var msg = err.responseJSON.message;
                var errors = err.responseJSON.errors;
                $.each(errors, function(key, value){
                    $('#err-'+key).html('<strong>'+value+'</strong>');
                    $('#err-'+key).show();
                });
            }
        });
    });

    // DELETE RECORD WITH sweetalert2 
    // DOWLOAD 

    $(document).on('click', '.delete-agenda', function(e){
        e.preventDefault();
        hideAllErrors();

        var id = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#B30D01',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{ url('/admin/delete/agenda') }}",
                    type: "POST",
                    data: {
                        id: id,
                    },
                    success: function(response){
                        $('#div-agenda').html(response);
                        Swal.fire({
                            type: 'success',
                            title: 'Deleted!',
                            text: "Event has been deleted.",
                            timer: 2000,
                            showCancelButton: false,
                            showConfirmButton: false
                        });
                    },
                    error: function(err){
                    }
                });
            }
        });
    });

});
</script>
@endsection