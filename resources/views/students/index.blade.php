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

            <h5  class="my-1 float-left">Students</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('students.student.create') }}" class="btn btn-success" title="Create New Student">
                    <i class="fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Student
                </a>
            </div>

        </div>

        @if(count($students) == 0)
            <div class="card-body text-center">
                <h4>No Students Available.</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Roll Number</th>
                            <th>Is Active</th>
                            <th>Gender</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                                <td>{{ $student->name }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->roll_number }}</td>
                            <td>{{ ($student->is_active) ? 'Yes' : 'No' }}</td>
                            <td>{{ $student->gender }}</td>

                            <td>

                                <form method="POST" action="{!! route('students.student.destroy', $student->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right " role="group">
                                        <a href="{{ route('students.student.show', $student->id ) }}"title="Show Student">
                                            <i class="fa fa-eye text-info" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('students.student.edit', $student->id ) }}" class="mx-4" title="Edit Student">
                                            <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" style="border: none;background: transparent"  title="Delete Student" onclick="return confirm(&quot;Click Ok to delete Student.&quot;)">
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
            {!! $students->render() !!}
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


