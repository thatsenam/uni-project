@extends('layouts.admin.app')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($smsContact->name) ? $smsContact->name : 'Sms Contact' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('sms_contacts.sms_contact.destroy', $smsContact->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('sms_contacts.sms_contact.index') }}" class="btn btn-primary mr-2" title="Show All Sms Contact">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Sms Contact
                    </a>

                    <a href="{{ route('sms_contacts.sms_contact.create') }}" class="btn btn-success mr-2" title="Create New Sms Contact">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Sms Contact
                    </a>

                    <a href="{{ route('sms_contacts.sms_contact.edit', $smsContact->id ) }}" class="btn btn-primary mr-2" title="Edit Sms Contact">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Sms Contact
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Sms Contact" onclick="return confirm(&quot;Click Ok to delete Sms Contact.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Sms Contact
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $smsContact->name }}</dd>
            <dt>Phone</dt>
            <dd>{{ $smsContact->phone }}</dd>
            <dt>Address</dt>
            <dd>{{ $smsContact->address }}</dd>

        </dl>

    </div>
</div>

@endsection
