@extends('layouts.admin.app')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">{{ !empty($smsContact->name) ? $smsContact->name : 'Sms Contact' }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('sms_contacts.sms_contact.index') }}" class="btn btn-primary mr-2" title="Show All Sms Contact">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Sms Contact
                </a>

                <a href="{{ route('sms_contacts.sms_contact.create') }}" class="btn btn-success" title="Create New Sms Contact">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Sms Contact
                </a>

            </div>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('sms_contacts.sms_contact.update', $smsContact->id) }}" id="edit_sms_contact_form" name="edit_sms_contact_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('sms_contacts.form', [
                                        'smsContact' => $smsContact,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
