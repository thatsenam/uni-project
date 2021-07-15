@extends('layout.default')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <i class=" fas fa-fw fa-check" aria-hidden="true"></i>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">Employees</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('employees.employee.create') }}" class="btn btn-success" title="Create New Employee">
                    <i class="fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Employee
                </a>
            </div>

        </div>

        @if(count($employees) == 0)
            <div class="card-body text-center">
                <h4>No Employees Available.</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>Eid</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Salary</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Nid</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr>
                                <td>{{ $employee->eid }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>{{ $employee->salary }}</td>
                            <td>{{ $employee->address }}</td>
                            <td>{{ $employee->gender }}</td>
                            <td>{{ $employee->nid }}</td>

                            <td>

                                <form method="POST" action="{!! route('employees.employee.destroy', $employee->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right " role="group">
                                        <a href="{{ route('employees.employee.show', $employee->id ) }}"title="Show Employee">
                                            <i class="fa fa-eye text-info" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('employees.employee.edit', $employee->id ) }}" class="mx-4" title="Edit Employee">
                                            <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" style="border: none;background: transparent"  title="Delete Employee" onclick="return confirm(&quot;Click Ok to delete Employee.&quot;)">
                                            <i class=" fas  fa-trash text-danger" aria-hidden="true"></i>
                                        </button>
                                    </div>

                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="card-footer">
            {!! $employees->render() !!}
        </div>

        @endif

    </div>
@endsection

@section('scripts')

     <script>
         $(document).ready(function () {
             $('table').DataTable({
                 responsive: true,
                 "order": [],
                 dom: 'lBfrtip',
                 buttons: [
                     'copy', 'excel', 'pdf', 'print'
                 ]

             });
         });
     </script>

     <style>
         .dataTables_filter {
             float: right;
         }
        i:hover { color: #0248fa !important; }

     </style>


@endsection


