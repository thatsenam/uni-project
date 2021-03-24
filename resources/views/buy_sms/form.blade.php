
<div class="form-group">
    <div class="col-md-10">
        <label for="amount_of_sms">এস এম এস এর সংখ্যা</label>


            @if(' required="true"'===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('amount_of_sms') ? 'is-invalid' : '' }}" name="amount_of_sms" type="number" id="amount_of_sms" value="{{ old('amount_of_sms', optional($buySms)->amount_of_sms) }}" data=" required="true""  placeholder="Enter amount of sms here...">

            {!! $errors->first('amount_of_sms', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="phone">মোবাইল</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone" type="text" id="phone" value="{{ old('phone', optional($buySms)->phone) }}" data=""  placeholder="Enter phone here...">

            {!! $errors->first('phone', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

