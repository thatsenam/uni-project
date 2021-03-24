@extends('layouts.admin.app')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">Create New Sms Contact</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('sms_contacts.sms_contact.index') }}" class="btn btn-primary" title="Show All Sms Contact">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Sms Contact
                </a>
            </div>

        </div>

        <div class="card-body">



            <form method="POST" action="{{ route('sms_contacts.sms_contact.store') }}" accept-charset="UTF-8" id="create_sms_contact_form" name="create_sms_contact_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('sms_contacts.form', [
                                        'smsContact' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


