<div class="add-user-section register-container line-k">

    <input type="hidden" id="agenda-record-id" value="{{ $agenda->id }}">
    
    <h2>Edit Event</h2>
    <h6>ENTER EVENT DETAILS BELOW</h6>
    <span id="err-title" class="invalid-feedback" style="display: block" role="alert">
        <strong></strong>
    </span>
    <legend>
        <input type="text" id="agenda-title" name="title" value="{{ $agenda->title }}">
        <label class="bold-label">TITLE</label>
    </legend>

    <span id="err-description" class="invalid-feedback" style="display: block" role="alert">
        <strong></strong>
    </span>
    <legend>
        <input type="text" id="agenda-description" name="description" value="{{ $agenda->description }}">
        <label>SUBTITLE</label>
    </legend>


    <span id="err-date" class="invalid-feedback" style="display: block" role="alert">
        <strong></strong>
    </span>
    <legend>
        @if($agenda->date == '0000-00-00')
        <input type="text" id="datepicker5" name="date" value="">
        @else
        <input type="text" id="datepicker5" name="date" value="{{ date_format(date_create($agenda->date),'m/d/Y') }}">
        @endif
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
                        <select name="time_start" id="agenda-time_start">
                            <option value="{{ $agenda->time_start }}">{{ date ('h:ia',strtotime($agenda->time_start)) }}</option>
                            <option value="">Select Start Time</option>
                            <option value="09:00:00">9:00 am</option>
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
                        <select name="time_end" id="agenda-time_end">
                            <option value="{{ $agenda->time_end }}">{{ date ('h:ia',strtotime($agenda->time_end)) }}</option>
                            <option value="">Select End Time</option>
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
            <select name="time_zone" id="agenda-time_zone">
                <option value="{{ $agenda->time_zone }}">{{ $agenda->time_zone }}</option>
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
            <select name="theater" id="agenda-theater">
                <option value="{{ $agenda->theater }}">{{ $agenda->theater }}</option>
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
            <select name="event_type" id="agenda-event_type">
                <option value="{{ $agenda->event_type }}">{{ $agenda->event_type }}</option>
                <option value="">Select Event Type</option>
                <option value="Presentation">Presentation</option>
                <option value="Networking">Networking</option>
                <option></option>
            </select>
            <span class="select-icon"></span>
            <label>EVENT TYPE</label>
        </legend>
    </div>

    <div class="links-group">
        <input id="btn-agenda-edit" type="submit" value="EDIT EVENT TO AGENDA" name="">
    </div>
</div>