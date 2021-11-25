
<h2>Add Form</h2>
<form id="edit_form" action="" class="smart-form">
    <input type="hidden" id="fee-record-id" value="{{ $fee->id }}">

    <label class="control-label">Name<span style="color:red; font-size:14px;">*</span></label>
    <label class="input">
        <input id="name" type="text" value="{{ $fee->name }}" autofocus>
    </label>
    <br>

    <label class="control-label">Display Name<span style="color:red; font-size:14px;">*</span></label>
    <label class="input">
        <input id="dname" type="text" value="{{ $fee->dname}}">
        
    </label>
    <br>

    <label class="control-label">Code<span style="color:red; font-size:14px;">*</span></label>
    <label class="input">
        <input id="code" type="text" value="{{  $fee->code }}">
    </label>
    <br>

    <button id="btn_save" type="submit">
    Save
    </button>
    <button id="btn_cancel" type="button">
    Cancel
    </button>


</form>