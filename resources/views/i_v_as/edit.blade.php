@extends('layout.default')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">{{ !empty($iVA->name) ? $iVA->name : 'I V A' }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('i_v_as.i_v_a.index') }}" class="btn btn-primary mr-2" title="Show All I V A">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All I V A
                </a>

                <a href="{{ route('i_v_as.i_v_a.create') }}" class="btn btn-success" title="Create New I V A">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New I V A
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

            <form method="POST" action="{{ route('i_v_as.i_v_a.update', $iVA->id) }}" id="edit_i_v_a_form" name="edit_i_v_a_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('i_v_as.form', [
                                        'iVA' => $iVA,
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
