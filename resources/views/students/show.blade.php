@extends('layout.default')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($student->name) ? $student->name : 'Student' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('students.student.destroy', $student->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('students.student.index') }}" class="btn btn-primary mr-2" title="Show All Student">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Student
                    </a>

                    <a href="{{ route('students.student.create') }}" class="btn btn-success mr-2" title="Create New Student">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Student
                    </a>

                    <a href="{{ route('students.student.edit', $student->id ) }}" class="btn btn-primary mr-2" title="Edit Student">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Student
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Student" onclick="return confirm(&quot;Click Ok to delete Student.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Student
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $student->name }}</dd>
            <dt>Phone</dt>
            <dd>{{ $student->phone }}</dd>
            <dt>Address</dt>
            <dd>{{ $student->address }}</dd>
            <dt>Photo</dt>
            <dd>{{ asset('storage/' . $student->photo) }}</dd>
            <dt>Roll Number</dt>
            <dd>{{ $student->roll_number }}</dd>
            <dt>Is Active</dt>
            <dd>{{ ($student->is_active) ? 'Yes' : 'No' }}</dd>
            <dt>Gender</dt>
            <dd>{{ $student->gender }}</dd>

        </dl>

    </div>
</div>

@endsection
