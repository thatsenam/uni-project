@extends('layout.default')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">Create New Specialize</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('specializes.specialize.index') }}" class="btn btn-primary" title="Show All Specialize">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Specialize
                </a>
            </div>

        </div>

        <div class="card-body">



            <form method="POST" action="{{ route('specializes.specialize.store') }}" accept-charset="UTF-8" id="create_specialize_form" name="create_specialize_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('specializes.form', [
                                        'specialize' => null,
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


