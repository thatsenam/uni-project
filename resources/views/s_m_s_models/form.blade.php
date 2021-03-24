
<div class="form-group">
    <div class="col-md-10">
        <label for="sms_template_id">এস এম এস টেমপ্লেট</label>


            <select class="form-control" id="sms_template_id" name="sms_template_id">
        	    <option value="" style="display: none;" {{ old('sms_template_id', optional($sMSModel)->sms_template_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select sms template</option>
        	@foreach ($smsTemplates as $key => $smsTemplate)
			    <option value="{{ $key }}" {{ old('sms_template_id', optional($sMSModel)->sms_template_id) == $key ? 'selected' : '' }}>
			    	{{ $smsTemplate }}
			    </option>
			@endforeach
        </select>
        
            {!! $errors->first('sms_template_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="sms_contact_id">Sms Contact</label>


            <select class="form-control" id="sms_contact_id" name="sms_contact_id">
        	    
        	@foreach ($smsContacts as $key => $smsContact)
			    <option value="{{ $key }}" {{ old('sms_contact_id', optional($sMSModel)->sms_contact_id) == $key ? 'selected' : '' }}>
			    	{{ $smsContact }}
			    </option>
			@endforeach
        </select>
        
            {!! $errors->first('sms_contact_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="is_all_supplier">সকল সরবরাহকারি ?</label>


            <div class="checkbox">
            <label for="is_all_supplier_1">
            	<input id="is_all_supplier_1" class="" name="is_all_supplier" type="checkbox" value="1" {{ old('is_all_supplier', optional($sMSModel)->is_all_supplier) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

            {!! $errors->first('is_all_supplier', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="is_all_customer">সকল গ্রাহক ?</label>


            <div class="checkbox">
            <label for="is_all_customer_1">
            	<input id="is_all_customer_1" class="" name="is_all_customer" type="checkbox" value="1" {{ old('is_all_customer', optional($sMSModel)->is_all_customer) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

            {!! $errors->first('is_all_customer', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="note">নোট</label>


            <textarea class="form-control" name="note" cols="50" rows="10" id="note" minlength="1" maxlength="1000">{{ old('note', optional($sMSModel)->note) }}</textarea>
            {!! $errors->first('note', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

