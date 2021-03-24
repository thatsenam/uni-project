@extends('admin.pos.master')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">Create New S M S Model</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('s_m_s_models.s_m_s_model.index') }}" class="btn btn-primary" title="Show All S M S Model">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All S M S Model
                </a>
            </div>

        </div>

        <div class="card-body">



            <form method="POST" action="{{ route('s_m_s_models.s_m_s_model.store') }}" accept-charset="UTF-8" id="create_s_m_s_model_form" name="create_s_m_s_model_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('s_m_s_models.form', [
                                        'sMSModel' => null,
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


