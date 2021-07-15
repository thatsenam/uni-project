@extends('layout.default')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($title) ? $title : 'Appointment' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('appointments.appointment.destroy', $appointment->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('appointments.appointment.index') }}" class="btn btn-primary mr-2" title="Show All Appointment">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Appointment
                    </a>

                    <a href="{{ route('appointments.appointment.create') }}" class="btn btn-success mr-2" title="Create New Appointment">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Appointment
                    </a>

                    <a href="{{ route('appointments.appointment.edit', $appointment->id ) }}" class="btn btn-primary mr-2" title="Edit Appointment">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Appointment
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Appointment" onclick="return confirm(&quot;Click Ok to delete Appointment.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Appointment
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Doctor</dt>
            <dd>{{ optional($appointment->doctor)->name }}</dd>
            <dt>Patient</dt>
            <dd>{{ optional($appointment->patient)->name }}</dd>
            <dt>Phone</dt>
            <dd>{{ $appointment->phone }}</dd>
            <dt>Appointment Date</dt>
            <dd>{{ $appointment->appointment_date }}</dd>
            <dt>Charge</dt>
            <dd>{{ $appointment->charge }}</dd>
            <dt>Note</dt>
            <dd>{{ $appointment->note }}</dd>

        </dl>

    </div>
</div>

@endsection
