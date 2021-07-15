
<div class="form-group">
    <div class="col-md-10">
        <label for="name">Name</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" type="text" id="name" value="{{ old('name', optional($patient)->name) }}" minlength="1" maxlength="255" data=""  placeholder="Enter name here...">

            {!! $errors->first('name', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="age">Age</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('age') ? 'is-invalid' : '' }}" name="age" type="number" id="age" value="{{ old('age', optional($patient)->age) }}" data=""  placeholder="Enter age here...">

            {!! $errors->first('age', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="gender">Gender</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" type="text" id="gender" value="{{ old('gender', optional($patient)->gender) }}" minlength="1" data=""  placeholder="Enter gender here...">

            {!! $errors->first('gender', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="phone">Phone</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone" type="text" id="phone" value="{{ old('phone', optional($patient)->phone) }}" minlength="1" data=""  placeholder="Enter phone here...">

            {!! $errors->first('phone', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="address">Address</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" type="text" id="address" value="{{ old('address', optional($patient)->address) }}" minlength="1" data=""  placeholder="Enter address here...">

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

        @if (isset($patient->photo) && !empty($patient->photo))
            <div class="input-group input-width-input">
                <span class="input-group-addon">
                    <input type="checkbox" name="custom_delete_photo" class="custom-delete-file" value="1" {{ old('custom_delete_photo', '0') == '1' ? 'checked' : '' }}> Delete
                </span>

                <span class="input-group-addon custom-delete-file-name">
                   <img class="card" src="{{ asset('storage/'.$patient->photo) }}" width="200">

                </span>
            </div>
        @endif

            {!! $errors->first('photo', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

