
<div class="form-group">
    <div class="col-md-10">
        <label for="name">Name</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" type="text" id="name" value="{{ old('name', optional($medicine)->name) }}" minlength="1" maxlength="255" data=""  placeholder="Enter name here...">

            {!! $errors->first('name', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="price">Price</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" type="text" id="price" value="{{ old('price', optional($medicine)->price) }}" minlength="1" data=""  placeholder="Enter price here...">

            {!! $errors->first('price', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

