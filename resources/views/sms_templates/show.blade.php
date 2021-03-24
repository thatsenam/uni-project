@extends('layouts.admin.app')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($smsTemplate->title) ? $smsTemplate->title : 'Sms Template' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('sms_templates.sms_template.destroy', $smsTemplate->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('sms_templates.sms_template.index') }}" class="btn btn-primary mr-2" title="Show All Sms Template">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Sms Template
                    </a>

                    <a href="{{ route('sms_templates.sms_template.create') }}" class="btn btn-success mr-2" title="Create New Sms Template">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Sms Template
                    </a>

                    <a href="{{ route('sms_templates.sms_template.edit', $smsTemplate->id ) }}" class="btn btn-primary mr-2" title="Edit Sms Template">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Sms Template
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Sms Template" onclick="return confirm(&quot;Click Ok to delete Sms Template.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Sms Template
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Title</dt>
            <dd>{{ $smsTemplate->title }}</dd>
            <dt>Body</dt>
            <dd>{{ $smsTemplate->body }}</dd>

        </dl>

    </div>
</div>

@endsection
