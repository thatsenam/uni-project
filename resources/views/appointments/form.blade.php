
<div class="form-group">
    <div class="col-md-10">
        <label for="doctor_id">Doctor</label>


            <select class="form-control" id="doctor_id" name="doctor_id">
        	    <option value="" style="display: none;" {{ old('doctor_id', optional($appointment)->doctor_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select doctor</option>
        	@foreach ($doctors as $key => $doctor)
			    <option value="{{ $key }}" {{ old('doctor_id', optional($appointment)->doctor_id) == $key ? 'selected' : '' }}>
			    	{{ $doctor }}
			    </option>
			@endforeach
        </select>
        
            {!! $errors->first('doctor_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="patient_id">Patient</label>


            <select class="form-control" id="patient_id" name="patient_id">
        	    <option value="" style="display: none;" {{ old('patient_id', optional($appointment)->patient_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select patient</option>
        	@foreach ($patients as $key => $patient)
			    <option value="{{ $key }}" {{ old('patient_id', optional($appointment)->patient_id) == $key ? 'selected' : '' }}>
			    	{{ $patient }}
			    </option>
			@endforeach
        </select>
        
            {!! $errors->first('patient_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="phone">Phone</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone" type="text" id="phone" value="{{ old('phone', optional($appointment)->phone) }}" minlength="1" data=""  placeholder="Enter phone here...">

            {!! $errors->first('phone', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="appointment_date">Appointment Date</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('appointment_date') ? 'is-invalid' : '' }}" name="appointment_date" type="text" id="appointment_date" value="{{ old('appointment_date', optional($appointment)->appointment_date) }}" data=""  placeholder="Enter appointment date here...">

            {!! $errors->first('appointment_date', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="charge">Charge</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('charge') ? 'is-invalid' : '' }}" name="charge" type="text" id="charge" value="{{ old('charge', optional($appointment)->charge) }}" minlength="1" data=""  placeholder="Enter charge here...">

            {!! $errors->first('charge', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="note">Note</label>


            <textarea class="form-control" name="note" cols="50" rows="10" id="note" minlength="1" maxlength="1000">{{ old('note', optional($appointment)->note) }}</textarea>
            {!! $errors->first('note', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

