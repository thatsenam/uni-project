
<div class="form-group">
    <div class="col-md-10">
        <label for="name">Name</label>


            @if(' required="true"'===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" type="text" id="name" value="{{ old('name', optional($smsContact)->name) }}" minlength="1" maxlength="255" data=" required="true""  placeholder="Enter name here...">

            {!! $errors->first('name', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="phone">Phone</label>


            @if(' required="true"'===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone" type="text" id="phone" value="{{ old('phone', optional($smsContact)->phone) }}" minlength="1" data=" required="true""  placeholder="Enter phone here...">

            {!! $errors->first('phone', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="address">Address</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" type="text" id="address" value="{{ old('address', optional($smsContact)->address) }}" minlength="1" data=""  placeholder="Enter address here...">

            {!! $errors->first('address', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

