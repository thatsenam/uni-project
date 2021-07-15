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

            <h5  class="my-1 float-left">Rooms</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('rooms.room.create') }}" class="btn btn-success" title="Create New Room">
                    <i class="fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Room
                </a>
            </div>

        </div>

        @if(count($rooms) == 0)
            <div class="card-body text-center">
                <h4>No Rooms Available.</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>Name</th>
                            <th>Room Type</th>
                            <th>Bed Count</th>
                            <th>Room Size</th>
                            <th>Is Air Conditioned</th>
                            <th>Charge</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($rooms as $room)
                        <tr>
                                <td>{{ $room->name }}</td>
                            <td>{{ $room->room_type }}</td>
                            <td>{{ $room->bed_count }}</td>
                            <td>{{ $room->room_size }}</td>
                            <td>{{ ($room->is_air_conditioned) ? 'Yes' : 'No' }}</td>
                            <td>{{ $room->charge }}</td>

                            <td>

                                <form method="POST" action="{!! route('rooms.room.destroy', $room->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right " role="group">
                                        <a href="{{ route('rooms.room.show', $room->id ) }}"title="Show Room">
                                            <i class="fa fa-eye text-info" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('rooms.room.edit', $room->id ) }}" class="mx-4" title="Edit Room">
                                            <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" style="border: none;background: transparent"  title="Delete Room" onclick="return confirm(&quot;Click Ok to delete Room.&quot;)">
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
            {!! $rooms->render() !!}
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


