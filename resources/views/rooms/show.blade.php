@extends('layout.default')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($room->name) ? $room->name : 'Room' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('rooms.room.destroy', $room->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('rooms.room.index') }}" class="btn btn-primary mr-2" title="Show All Room">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Room
                    </a>

                    <a href="{{ route('rooms.room.create') }}" class="btn btn-success mr-2" title="Create New Room">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Room
                    </a>

                    <a href="{{ route('rooms.room.edit', $room->id ) }}" class="btn btn-primary mr-2" title="Edit Room">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Room
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Room" onclick="return confirm(&quot;Click Ok to delete Room.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Room
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $room->name }}</dd>
            <dt>Room Type</dt>
            <dd>{{ $room->room_type }}</dd>
            <dt>Bed Count</dt>
            <dd>{{ $room->bed_count }}</dd>
            <dt>Room Size</dt>
            <dd>{{ $room->room_size }}</dd>
            <dt>Is Air Conditioned</dt>
            <dd>{{ ($room->is_air_conditioned) ? 'Yes' : 'No' }}</dd>
            <dt>Description</dt>
            <dd>{{ $room->description }}</dd>
            <dt>Charge</dt>
            <dd>{{ $room->charge }}</dd>

        </dl>

    </div>
</div>

@endsection
