@extends('admin.pos.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($title) ? $title : 'S M S Model' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('s_m_s_models.s_m_s_model.destroy', $sMSModel->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('s_m_s_models.s_m_s_model.index') }}" class="btn btn-primary mr-2" title="Show All S M S Model">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All S M S Model
                    </a>

                    <a href="{{ route('s_m_s_models.s_m_s_model.create') }}" class="btn btn-success mr-2" title="Create New S M S Model">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New S M S Model
                    </a>

                    <a href="{{ route('s_m_s_models.s_m_s_model.edit', $sMSModel->id ) }}" class="btn btn-primary mr-2" title="Edit S M S Model">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit S M S Model
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete S M S Model" onclick="return confirm(&quot;Click Ok to delete S M S Model.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete S M S Model
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>এস এম এস টেমপ্লেট</dt>
            <dd>{{ optional($sMSModel->smsTemplate)->title }}</dd>
            <dt>Sms Contact</dt>
            <dd>{{ optional($sMSModel->smsContact)->name }}</dd>
            <dt>সকল সরবরাহকারি ?</dt>
            <dd>{{ ($sMSModel->is_all_supplier) ? 'Yes' : 'No' }}</dd>
            <dt>সকল গ্রাহক ?</dt>
            <dd>{{ ($sMSModel->is_all_customer) ? 'Yes' : 'No' }}</dd>
            <dt>Is Sent</dt>
            <dd>{{ ($sMSModel->is_sent) ? 'Yes' : 'No' }}</dd>
            <dt>নোট</dt>
            <dd>{{ $sMSModel->note }}</dd>

        </dl>

    </div>
</div>

@endsection
