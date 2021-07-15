@extends('layout.default')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">{{ !empty($employee->name) ? $employee->name : 'Employee' }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('employees.employee.index') }}" class="btn btn-primary mr-2" title="Show All Employee">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Employee
                </a>

                <a href="{{ route('employees.employee.create') }}" class="btn btn-success" title="Create New Employee">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Employee
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

            <form method="POST" action="{{ route('employees.employee.update', $employee->id) }}" id="edit_employee_form" name="edit_employee_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('employees.form', [
                                        'employee' => $employee,
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
