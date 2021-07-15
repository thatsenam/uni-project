
<div class="form-group">
    <div class="col-md-10">
        <label for="name">Doctor Name</label>


            @if(' required="true"'===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" type="text" id="name" value="{{ old('name', optional($doctor)->name) }}" minlength="1" maxlength="255" data=" required="true""  placeholder="Enter name here...">

            {!! $errors->first('name', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="age">Age</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('age') ? 'is-invalid' : '' }}" name="age" type="number" id="age" value="{{ old('age', optional($doctor)->age) }}" data=""  placeholder="Enter age here...">

            {!! $errors->first('age', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="gender">Gender</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" type="text" id="gender" value="{{ old('gender', optional($doctor)->gender) }}" data=""  placeholder="Enter gender here...">

            {!! $errors->first('gender', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="phone">Phone</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone" type="text" id="phone" value="{{ old('phone', optional($doctor)->phone) }}" data=""  placeholder="Enter phone here...">

            {!! $errors->first('phone', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="email">Email</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" type="email" id="email" value="{{ old('email', optional($doctor)->email) }}" data=""  placeholder="Enter email here...">

            {!! $errors->first('email', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="password">Password</label>


            <input class="form-control" name="password" type="password" id="password" value="{{ old('password', optional($doctor)->password) }}" placeholder="Enter password here...">
            {!! $errors->first('password', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="fee">Fee</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('fee') ? 'is-invalid' : '' }}" name="fee" type="text" id="fee" value="{{ old('fee', optional($doctor)->fee) }}" data=""  placeholder="Enter fee here...">

            {!! $errors->first('fee', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="specialize_id">Specialize</label>


            <select class="form-control" id="specialize_id" name="specialize_id">
        	    <option value="" style="display: none;" {{ old('specialize_id', optional($doctor)->specialize_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select specialize</option>
        	@foreach ($specializes as $key => $specialize)
			    <option value="{{ $key }}" {{ old('specialize_id', optional($doctor)->specialize_id) == $key ? 'selected' : '' }}>
			    	{{ $specialize }}
			    </option>
			@endforeach
        </select>
        
            {!! $errors->first('specialize_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="address">Address</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" type="text" id="address" value="{{ old('address', optional($doctor)->address) }}" data=""  placeholder="Enter address here...">

            {!! $errors->first('address', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="file">Other Documents (If have)</label>


            <div class="input-group uploaded-file-group">
            <label class="input-group-btn">
                <span class="btn btn-default">
                     <input type="file" name="file" id="file" class="form-control-file">
                </span>
            </label>
            <input type="text" class="form-control uploaded-file-name" hidden>
        </div>

        @if (isset($doctor->file) && !empty($doctor->file))
            <div class="input-group input-width-input">
                <span class="input-group-addon">
                    <input type="checkbox" name="custom_delete_file" class="custom-delete-file" value="1" {{ old('custom_delete_file', '0') == '1' ? 'checked' : '' }}> Delete
                </span>

                <span class="input-group-addon custom-delete-file-name">
                   <img class="card" src="{{ asset('storage/'.$doctor->file) }}" width="200">

                </span>
            </div>
        @endif

            {!! $errors->first('file', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

