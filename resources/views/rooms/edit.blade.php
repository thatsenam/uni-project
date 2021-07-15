@extends('layout.default')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">{{ !empty($room->name) ? $room->name : 'Room' }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('rooms.room.index') }}" class="btn btn-primary mr-2" title="Show All Room">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Room
                </a>

                <a href="{{ route('rooms.room.create') }}" class="btn btn-success" title="Create New Room">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Room
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

            <form method="POST" action="{{ route('rooms.room.update', $room->id) }}" id="edit_room_form" name="edit_room_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('rooms.form', [
                                        'room' => $room,
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
