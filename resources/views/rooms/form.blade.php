
<div class="form-group">
    <div class="col-md-10">
        <label for="name">Name</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" type="text" id="name" value="{{ old('name', optional($room)->name) }}" minlength="1" maxlength="255" data=""  placeholder="Enter name here...">

            {!! $errors->first('name', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="room_type">Room Type</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('room_type') ? 'is-invalid' : '' }}" name="room_type" type="text" id="room_type" value="{{ old('room_type', optional($room)->room_type) }}" minlength="1" data=""  placeholder="Enter room type here...">

            {!! $errors->first('room_type', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="bed_count">Bed Count</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('bed_count') ? 'is-invalid' : '' }}" name="bed_count" type="number" id="bed_count" value="{{ old('bed_count', optional($room)->bed_count) }}" data=""  placeholder="Enter bed count here...">

            {!! $errors->first('bed_count', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="room_size">Room Size</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('room_size') ? 'is-invalid' : '' }}" name="room_size" type="text" id="room_size" value="{{ old('room_size', optional($room)->room_size) }}" minlength="1" data=""  placeholder="Enter room size here...">

            {!! $errors->first('room_size', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="is_air_conditioned">Is Air Conditioned</label>


            <div class="checkbox">
            <label for="is_air_conditioned_1">
            	<input id="is_air_conditioned_1" class="" name="is_air_conditioned" type="checkbox" value="1" {{ old('is_air_conditioned', optional($room)->is_air_conditioned) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

            {!! $errors->first('is_air_conditioned', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="description">Description</label>


            <textarea class="form-control" name="description" cols="50" rows="10" id="description" minlength="1" maxlength="1000">{{ old('description', optional($room)->description) }}</textarea>
            {!! $errors->first('description', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="charge">Charge</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('charge') ? 'is-invalid' : '' }}" name="charge" type="text" id="charge" value="{{ old('charge', optional($room)->charge) }}" minlength="1" data=""  placeholder="Enter charge here...">

            {!! $errors->first('charge', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

