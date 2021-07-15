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

            <h5  class="my-1 float-left">Medicines</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('medicines.medicine.create') }}" class="btn btn-success" title="Create New Medicine">
                    <i class="fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Medicine
                </a>
            </div>

        </div>

        @if(count($medicines) == 0)
            <div class="card-body text-center">
                <h4>No Medicines Available.</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>Name</th>
                            <th>Price</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($medicines as $medicine)
                        <tr>
                                <td>{{ $medicine->name }}</td>
                            <td>{{ $medicine->price }}</td>

                            <td>

                                <form method="POST" action="{!! route('medicines.medicine.destroy', $medicine->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right " role="group">
                                        <a href="{{ route('medicines.medicine.show', $medicine->id ) }}"title="Show Medicine">
                                            <i class="fa fa-eye text-info" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('medicines.medicine.edit', $medicine->id ) }}" class="mx-4" title="Edit Medicine">
                                            <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" style="border: none;background: transparent"  title="Delete Medicine" onclick="return confirm(&quot;Click Ok to delete Medicine.&quot;)">
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
            {!! $medicines->render() !!}
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


