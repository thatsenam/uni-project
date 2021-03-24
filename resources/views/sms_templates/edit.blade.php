@extends('layouts.admin.app')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">{{ !empty($smsTemplate->title) ? $smsTemplate->title : 'Sms Template' }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('sms_templates.sms_template.index') }}" class="btn btn-primary mr-2" title="Show All Sms Template">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Sms Template
                </a>

                <a href="{{ route('sms_templates.sms_template.create') }}" class="btn btn-success" title="Create New Sms Template">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Sms Template
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

            <form method="POST" action="{{ route('sms_templates.sms_template.update', $smsTemplate->id) }}" id="edit_sms_template_form" name="edit_sms_template_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('sms_templates.form', [
                                        'smsTemplate' => $smsTemplate,
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
