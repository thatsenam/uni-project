@extends('layout.default')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($employee->name) ? $employee->name : 'Employee' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('employees.employee.destroy', $employee->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('employees.employee.index') }}" class="btn btn-primary mr-2" title="Show All Employee">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Employee
                    </a>

                    <a href="{{ route('employees.employee.create') }}" class="btn btn-success mr-2" title="Create New Employee">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Employee
                    </a>

                    <a href="{{ route('employees.employee.edit', $employee->id ) }}" class="btn btn-primary mr-2" title="Edit Employee">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Employee
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Employee" onclick="return confirm(&quot;Click Ok to delete Employee.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Employee
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Eid</dt>
            <dd>{{ $employee->eid }}</dd>
            <dt>Name</dt>
            <dd>{{ $employee->name }}</dd>
            <dt>Phone</dt>
            <dd>{{ $employee->phone }}</dd>
            <dt>Salary</dt>
            <dd>{{ $employee->salary }}</dd>
            <dt>Address</dt>
            <dd>{{ $employee->address }}</dd>
            <dt>Gender</dt>
            <dd>{{ $employee->gender }}</dd>
            <dt>Nid</dt>
            <dd>{{ $employee->nid }}</dd>

        </dl>

    </div>
</div>

@endsection
