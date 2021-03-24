
<div class="form-group">
    <div class="col-md-10">
        <label for="title">Title</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" type="text" id="title" value="{{ old('title', optional($post)->title) }}" minlength="1" maxlength="255" data=""  placeholder="Enter title here...">

            {!! $errors->first('title', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="description">Description</label>


            <textarea class="form-control" name="description" cols="50" rows="10" id="description" minlength="1" maxlength="1000">{{ old('description', optional($post)->description) }}</textarea>
            {!! $errors->first('description', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

