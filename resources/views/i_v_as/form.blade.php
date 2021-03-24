
<div class="form-group">
    <div class="col-md-10">
        <label for="name">Name</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" type="text" id="name" value="{{ old('name', optional($iVA)->name) }}" minlength="1" maxlength="255" data=""  placeholder="Enter name here...">

            {!! $errors->first('name', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="vat">Vat</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('vat') ? 'is-invalid' : '' }}" name="vat" type="text" id="vat" value="{{ old('vat', optional($iVA)->vat) }}" minlength="1" data=""  placeholder="Enter vat here...">

            {!! $errors->first('vat', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="note">Note</label>


            <textarea class="form-control" name="note" cols="50" rows="10" id="note" minlength="1" maxlength="1000">{{ old('note', optional($iVA)->note) }}</textarea>
            {!! $errors->first('note', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

