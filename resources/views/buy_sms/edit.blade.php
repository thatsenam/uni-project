@extends('admin.pos.master')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">{{ !empty($title) ? $title : 'Buy Sms' }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('buy_sms.buy_sms.index') }}" class="btn btn-primary mr-2" title="Show All Buy Sms">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Buy Sms
                </a>

                <a href="{{ route('buy_sms.buy_sms.create') }}" class="btn btn-success" title="Create New Buy Sms">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Buy Sms
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

            <form method="POST" action="{{ route('buy_sms.buy_sms.update', $buySms->id) }}" id="edit_buy_sms_form" name="edit_buy_sms_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('buy_sms.form', [
                                        'buySms' => $buySms,
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
