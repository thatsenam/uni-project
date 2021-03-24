
<div class="form-group">
    <div class="col-md-10">
        <label for="name">Name</label>


            @if(' required="true"'===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" type="text" id="name" value="{{ old('name', optional($student)->name) }}" minlength="1" maxlength="255" data=" required="true""  placeholder="Enter name here...">

            {!! $errors->first('name', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="phone">Phone</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone" type="text" id="phone" value="{{ old('phone', optional($student)->phone) }}" minlength="1" data=""  placeholder="Enter phone here...">

            {!! $errors->first('phone', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="address">Address</label>


            <textarea class="form-control" name="address" cols="50" rows="10" id="address" minlength="1" placeholder="Enter address here...">{{ old('address', optional($student)->address) }}</textarea>
            {!! $errors->first('address', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="photo">Photo</label>


            <div class="input-group uploaded-file-group">
            <label class="input-group-btn">
                <span class="btn btn-default">
                     <input type="file" name="photo" id="photo" class="form-control-file">
                </span>
            </label>
            <input type="text" class="form-control uploaded-file-name" hidden>
        </div>

        @if (isset($student->photo) && !empty($student->photo))
            <div class="input-group input-width-input">
                <span class="input-group-addon">
                    <input type="checkbox" name="custom_delete_photo" class="custom-delete-file" value="1" {{ old('custom_delete_photo', '0') == '1' ? 'checked' : '' }}> Delete
                </span>

                <span class="input-group-addon custom-delete-file-name">
                   <img class="card" src="{{ asset('storage/'.$student->photo) }}" width="200">

                </span>
            </div>
        @endif

            {!! $errors->first('photo', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="roll_number">Roll Number</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('roll_number') ? 'is-invalid' : '' }}" name="roll_number" type="number" id="roll_number" value="{{ old('roll_number', optional($student)->roll_number) }}" data=""  placeholder="Enter roll number here...">

            {!! $errors->first('roll_number', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="is_active">Is Active</label>


            <div class="checkbox">
            <label for="is_active_1">
            	<input id="is_active_1" class="" name="is_active" type="checkbox" value="1" {{ old('is_active', optional($student)->is_active) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

            {!! $errors->first('is_active', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="gender">Gender</label>


            <select class="form-control" id="gender" name="gender">
        	    <option value="" style="display: none;" {{ old('gender', optional($student)->gender ?: '') == '' ? 'selected' : '' }} disabled selected>Enter gender here...</option>
        	@foreach (['0' => 'Male',
'1' => 'Female',
'2' => 'Rather Not To Say'] as $key => $text)
			    <option value="{{ $key }}" {{ old('gender', optional($student)->gender) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        
            {!! $errors->first('gender', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

