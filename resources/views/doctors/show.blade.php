@extends('layout.default')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($doctor->name) ? $doctor->name : 'Doctor' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('doctors.doctor.destroy', $doctor->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('doctors.doctor.index') }}" class="btn btn-primary mr-2" title="Show All Doctor">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Doctor
                    </a>

                    <a href="{{ route('doctors.doctor.create') }}" class="btn btn-success mr-2" title="Create New Doctor">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Doctor
                    </a>

                    <a href="{{ route('doctors.doctor.edit', $doctor->id ) }}" class="btn btn-primary mr-2" title="Edit Doctor">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Doctor
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Doctor" onclick="return confirm(&quot;Click Ok to delete Doctor.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Doctor
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Doctor Name</dt>
            <dd>{{ $doctor->name }}</dd>
            <dt>Age</dt>
            <dd>{{ $doctor->age }}</dd>
            <dt>Gender</dt>
            <dd>{{ $doctor->gender }}</dd>
            <dt>Phone</dt>
            <dd>{{ $doctor->phone }}</dd>
            <dt>Email</dt>
            <dd>{{ $doctor->email }}</dd>
            <dt>Password</dt>
            <dd>{{ $doctor->password }}</dd>
            <dt>Fee</dt>
            <dd>{{ $doctor->fee }}</dd>
            <dt>Specialize</dt>
            <dd>{{ optional($doctor->specialize)->name }}</dd>
            <dt>Address</dt>
            <dd>{{ $doctor->address }}</dd>
            <dt>Other Documents (If have)</dt>
            <dd>{{ asset('storage/' . $doctor->file) }}</dd>

        </dl>

    </div>
</div>

@endsection
