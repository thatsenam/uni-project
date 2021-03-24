
<div class="form-group">
    <div class="col-md-10">
        <label for="title">Title</label>


            @if(' required="true"'===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" type="text" id="title" value="{{ old('title', optional($smsTemplate)->title) }}" minlength="1" maxlength="255" data=" required="true""  placeholder="Enter title here...">

            {!! $errors->first('title', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="body">Body</label>


            @if(' required="true"'===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body" type="text" id="body" value="{{ old('body', optional($smsTemplate)->body) }}" minlength="1" data=" required="true""  placeholder="Enter body here...">

            {!! $errors->first('body', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

