@extends('layout.default')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">{{ !empty($title) ? $title : 'Bill' }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('bills.bill.index') }}" class="btn btn-primary mr-2" title="Show All Bill">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Bill
                </a>

                <a href="{{ route('bills.bill.create') }}" class="btn btn-success" title="Create New Bill">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Bill
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

            <form method="POST" action="{{ route('bills.bill.update', $bill->id) }}" id="edit_bill_form" name="edit_bill_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('bills.form', [
                                        'bill' => $bill,
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
