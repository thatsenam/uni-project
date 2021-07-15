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

            <h5  class="my-1 float-left">Doctors</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('doctors.doctor.create') }}" class="btn btn-success" title="Create New Doctor">
                    <i class="fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Doctor
                </a>
            </div>

        </div>

        @if(count($doctors) == 0)
            <div class="card-body text-center">
                <h4>No Doctors Available.</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>Doctor Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Fee</th>
                            <th>Specialize</th>
                            <th>Address</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($doctors as $doctor)
                        <tr>
                                <td>{{ $doctor->name }}</td>
                            <td>{{ $doctor->age }}</td>
                            <td>{{ $doctor->gender }}</td>
                            <td>{{ $doctor->phone }}</td>
                            <td>{{ $doctor->email }}</td>
                            <td>{{ $doctor->password }}</td>
                            <td>{{ $doctor->fee }}</td>
                            <td>{{ optional($doctor->specialize)->name }}</td>
                            <td>{{ $doctor->address }}</td>

                            <td>

                                <form method="POST" action="{!! route('doctors.doctor.destroy', $doctor->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right " role="group">
                                        <a href="{{ route('doctors.doctor.show', $doctor->id ) }}"title="Show Doctor">
                                            <i class="fa fa-eye text-info" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('doctors.doctor.edit', $doctor->id ) }}" class="mx-4" title="Edit Doctor">
                                            <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" style="border: none;background: transparent"  title="Delete Doctor" onclick="return confirm(&quot;Click Ok to delete Doctor.&quot;)">
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
            {!! $doctors->render() !!}
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


