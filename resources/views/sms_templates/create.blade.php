@extends('layouts.admin.app')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">Create New Sms Template</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('sms_templates.sms_template.index') }}" class="btn btn-primary" title="Show All Sms Template">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Sms Template
                </a>
            </div>

        </div>

        <div class="card-body">



            <form method="POST" action="{{ route('sms_templates.sms_template.store') }}" accept-charset="UTF-8" id="create_sms_template_form" name="create_sms_template_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('sms_templates.form', [
                                        'smsTemplate' => null,
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


