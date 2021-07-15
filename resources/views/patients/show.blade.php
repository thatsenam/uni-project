@extends('layout.default')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($patient->name) ? $patient->name : 'Patient' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('patients.patient.destroy', $patient->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('patients.patient.index') }}" class="btn btn-primary mr-2" title="Show All Patient">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Patient
                    </a>

                    <a href="{{ route('patients.patient.create') }}" class="btn btn-success mr-2" title="Create New Patient">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Patient
                    </a>

                    <a href="{{ route('patients.patient.edit', $patient->id ) }}" class="btn btn-primary mr-2" title="Edit Patient">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Patient
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Patient" onclick="return confirm(&quot;Click Ok to delete Patient.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Patient
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $patient->name }}</dd>
            <dt>Age</dt>
            <dd>{{ $patient->age }}</dd>
            <dt>Gender</dt>
            <dd>{{ $patient->gender }}</dd>
            <dt>Phone</dt>
            <dd>{{ $patient->phone }}</dd>
            <dt>Address</dt>
            <dd>{{ $patient->address }}</dd>
            <dt>Photo</dt>
            <dd>{{ asset('storage/' . $patient->photo) }}</dd>

        </dl>

    </div>
</div>

@endsection
