
<div class="form-group">
    <div class="col-md-10">
        <label for="bill_no">Bill No</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('bill_no') ? 'is-invalid' : '' }}" name="bill_no" type="text" id="bill_no" value="{{ old('bill_no', optional($bill)->bill_no) }}" minlength="1" data=""  placeholder="Enter bill no here...">

            {!! $errors->first('bill_no', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="room_id">Room</label>


            <select class="form-control" id="room_id" name="room_id">
        	    <option value="" style="display: none;" {{ old('room_id', optional($bill)->room_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select room</option>
        	@foreach ($rooms as $key => $room)
			    <option value="{{ $key }}" {{ old('room_id', optional($bill)->room_id) == $key ? 'selected' : '' }}>
			    	{{ $room }}
			    </option>
			@endforeach
        </select>
        
            {!! $errors->first('room_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="patient_id">Patient</label>


            <select class="form-control" id="patient_id" name="patient_id">
        	    <option value="" style="display: none;" {{ old('patient_id', optional($bill)->patient_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select patient</option>
        	@foreach ($patients as $key => $patient)
			    <option value="{{ $key }}" {{ old('patient_id', optional($bill)->patient_id) == $key ? 'selected' : '' }}>
			    	{{ $patient }}
			    </option>
			@endforeach
        </select>
        
            {!! $errors->first('patient_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="doctor_charge">Doctor Charge</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('doctor_charge') ? 'is-invalid' : '' }}" name="doctor_charge" type="text" id="doctor_charge" value="{{ old('doctor_charge', optional($bill)->doctor_charge) }}" minlength="1" data=""  placeholder="Enter doctor charge here...">

            {!! $errors->first('doctor_charge', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="room_charge">Room Charge</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('room_charge') ? 'is-invalid' : '' }}" name="room_charge" type="text" id="room_charge" value="{{ old('room_charge', optional($bill)->room_charge) }}" minlength="1" data=""  placeholder="Enter room charge here...">

            {!! $errors->first('room_charge', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="total_charge">Total Charge</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('total_charge') ? 'is-invalid' : '' }}" name="total_charge" type="number" id="total_charge" value="{{ old('total_charge', optional($bill)->total_charge) }}" data=""  placeholder="Enter total charge here...">

            {!! $errors->first('total_charge', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="doctor_id">Doctor</label>


            <select class="form-control" id="doctor_id" name="doctor_id">
        	    <option value="" style="display: none;" {{ old('doctor_id', optional($bill)->doctor_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select doctor</option>
        	@foreach ($doctors as $key => $doctor)
			    <option value="{{ $key }}" {{ old('doctor_id', optional($bill)->doctor_id) == $key ? 'selected' : '' }}>
			    	{{ $doctor }}
			    </option>
			@endforeach
        </select>
        
            {!! $errors->first('doctor_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="bill_by">Bill By</label>


            <select class="form-control" id="bill_by" name="bill_by">
        	    <option value="" style="display: none;" {{ old('bill_by', optional($bill)->bill_by ?: '') == '' ? 'selected' : '' }} disabled selected>Select bill by</option>
        	@foreach ($billBies as $key => $billBy)
			    <option value="{{ $key }}" {{ old('bill_by', optional($bill)->bill_by) == $key ? 'selected' : '' }}>
			    	{{ $billBy }}
			    </option>
			@endforeach
        </select>
        
            {!! $errors->first('bill_by', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="date">Date</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('date') ? 'is-invalid' : '' }}" name="date" type="text" id="date" value="{{ old('date', optional($bill)->date) }}" minlength="1" data=""  placeholder="Enter date here...">

            {!! $errors->first('date', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="notes">Notes</label>


            <textarea class="form-control" name="notes" cols="50" rows="10" id="notes" minlength="1" maxlength="1000">{{ old('notes', optional($bill)->notes) }}</textarea>
            {!! $errors->first('notes', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

