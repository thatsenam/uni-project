@extends('admin.pos.master')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">Create New Buy Sms</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('buy_sms.buy_sms.index') }}" class="btn btn-primary" title="Show All Buy Sms">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Buy Sms
                </a>
            </div>

        </div>

        <div class="card-body">



            <form method="POST" action="{{ route('buy_sms.buy_sms.store') }}" accept-charset="UTF-8" id="create_buy_sms_form" name="create_buy_sms_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('buy_sms.form', [
                                        'buySms' => null,
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


