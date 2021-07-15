@extends('layout.default')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">{{ !empty($patient->name) ? $patient->name : 'Patient' }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('patients.patient.index') }}" class="btn btn-primary mr-2" title="Show All Patient">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Patient
                </a>

                <a href="{{ route('patients.patient.create') }}" class="btn btn-success" title="Create New Patient">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Patient
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

            <form method="POST" action="{{ route('patients.patient.update', $patient->id) }}" id="edit_patient_form" name="edit_patient_form" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('patients.form', [
                                        'patient' => $patient,
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
