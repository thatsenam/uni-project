@extends('layout.default')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">{{ !empty($doctor->name) ? $doctor->name : 'Doctor' }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('doctors.doctor.index') }}" class="btn btn-primary mr-2" title="Show All Doctor">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Doctor
                </a>

                <a href="{{ route('doctors.doctor.create') }}" class="btn btn-success" title="Create New Doctor">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Doctor
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

            <form method="POST" action="{{ route('doctors.doctor.update', $doctor->id) }}" id="edit_doctor_form" name="edit_doctor_form" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('doctors.form', [
                                        'doctor' => $doctor,
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
