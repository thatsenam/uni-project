@extends('layout.default')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($title) ? $title : 'Bill' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('bills.bill.destroy', $bill->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('bills.bill.index') }}" class="btn btn-primary mr-2" title="Show All Bill">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Bill
                    </a>

                    <a href="{{ route('bills.bill.create') }}" class="btn btn-success mr-2" title="Create New Bill">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Bill
                    </a>

                    <a href="{{ route('bills.bill.edit', $bill->id ) }}" class="btn btn-primary mr-2" title="Edit Bill">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Bill
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Bill" onclick="return confirm(&quot;Click Ok to delete Bill.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Bill
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Bill No</dt>
            <dd>{{ $bill->bill_no }}</dd>
            <dt>Room</dt>
            <dd>{{ optional($bill->room)->name }}</dd>
            <dt>Patient</dt>
            <dd>{{ optional($bill->patient)->name }}</dd>
            <dt>Doctor Charge</dt>
            <dd>{{ $bill->doctor_charge }}</dd>
            <dt>Room Charge</dt>
            <dd>{{ $bill->room_charge }}</dd>
            <dt>Total Charge</dt>
            <dd>{{ $bill->total_charge }}</dd>
            <dt>Doctor</dt>
            <dd>{{ optional($bill->doctor)->name }}</dd>
            <dt>Bill By</dt>
            <dd>{{ optional($bill->billBy)->id }}</dd>
            <dt>Date</dt>
            <dd>{{ $bill->date }}</dd>
            <dt>Notes</dt>
            <dd>{{ $bill->notes }}</dd>

        </dl>

    </div>
</div>

@endsection
