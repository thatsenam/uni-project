
<div class="form-group">
    <div class="col-md-10">
        <label for="test_name">Test Name</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('test_name') ? 'is-invalid' : '' }}" name="test_name" type="text" id="test_name" value="{{ old('test_name', optional($test)->test_name) }}" minlength="1" data=""  placeholder="Enter test name here...">

            {!! $errors->first('test_name', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="patient_id">Patient</label>


            <select class="form-control" id="patient_id" name="patient_id">
        	    <option value="" style="display: none;" {{ old('patient_id', optional($test)->patient_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select patient</option>
        	@foreach ($patients as $key => $patient)
			    <option value="{{ $key }}" {{ old('patient_id', optional($test)->patient_id) == $key ? 'selected' : '' }}>
			    	{{ $patient }}
			    </option>
			@endforeach
        </select>
        
            {!! $errors->first('patient_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="doctor_id">Doctor</label>


            <select class="form-control" id="doctor_id" name="doctor_id">
        	    <option value="" style="display: none;" {{ old('doctor_id', optional($test)->doctor_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select doctor</option>
        	@foreach ($doctors as $key => $doctor)
			    <option value="{{ $key }}" {{ old('doctor_id', optional($test)->doctor_id) == $key ? 'selected' : '' }}>
			    	{{ $doctor }}
			    </option>
			@endforeach
        </select>
        
            {!! $errors->first('doctor_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="bill_id">Bill</label>


            <select class="form-control" id="bill_id" name="bill_id">
        	    <option value="" style="display: none;" {{ old('bill_id', optional($test)->bill_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select bill</option>
        	@foreach ($bills as $key => $bill)
			    <option value="{{ $key }}" {{ old('bill_id', optional($test)->bill_id) == $key ? 'selected' : '' }}>
			    	{{ $bill }}
			    </option>
			@endforeach
        </select>
        
            {!! $errors->first('bill_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="test_date">Test Date</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('test_date') ? 'is-invalid' : '' }}" name="test_date" type="text" id="test_date" value="{{ old('test_date', optional($test)->test_date) }}" data=""  placeholder="Enter test date here...">

            {!! $errors->first('test_date', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="test_result">Test Result</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('test_result') ? 'is-invalid' : '' }}" name="test_result" type="text" id="test_result" value="{{ old('test_result', optional($test)->test_result) }}" minlength="1" data=""  placeholder="Enter test result here...">

            {!! $errors->first('test_result', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

