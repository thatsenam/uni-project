@extends('layout.default')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">Create New Patient</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('patients.patient.index') }}" class="btn btn-primary" title="Show All Patient">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Patient
                </a>
            </div>

        </div>

        <div class="card-body">



            <form method="POST" action="{{ route('patients.patient.store') }}" accept-charset="UTF-8" id="create_patient_form" name="create_patient_form" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include ('patients.form', [
                                        'patient' => null,
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


