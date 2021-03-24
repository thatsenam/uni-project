@extends('layout.default')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">Create New I V A</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('i_v_as.i_v_a.index') }}" class="btn btn-primary" title="Show All I V A">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All I V A
                </a>
            </div>

        </div>

        <div class="card-body">



            <form method="POST" action="{{ route('i_v_as.i_v_a.store') }}" accept-charset="UTF-8" id="create_i_v_a_form" name="create_i_v_a_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('i_v_as.form', [
                                        'iVA' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


