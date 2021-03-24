@extends('admin.pos.master')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($title) ? $title : 'Buy Sms' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('buy_sms.buy_sms.destroy', $buySms->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('buy_sms.buy_sms.index') }}" class="btn btn-primary mr-2" title="Show All Buy Sms">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Buy Sms
                    </a>

                    <a href="{{ route('buy_sms.buy_sms.create') }}" class="btn btn-success mr-2" title="Create New Buy Sms">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Buy Sms
                    </a>

                    <a href="{{ route('buy_sms.buy_sms.edit', $buySms->id ) }}" class="btn btn-primary mr-2" title="Edit Buy Sms">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Buy Sms
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Buy Sms" onclick="return confirm(&quot;Click Ok to delete Buy Sms.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Buy Sms
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>এস এম এস এর সংখ্যা</dt>
            <dd>{{ $buySms->amount_of_sms }}</dd>
            <dt>মোবাইল</dt>
            <dd>{{ $buySms->phone }}</dd>
            <dt>Is Granted</dt>
            <dd>{{ ($buySms->is_granted) ? 'Yes' : 'No' }}</dd>

        </dl>

    </div>
</div>

@endsection
