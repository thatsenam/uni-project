@extends('admin.pos.master')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">{{ !empty($title) ? $title : 'S M S Model' }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('s_m_s_models.s_m_s_model.index') }}" class="btn btn-primary mr-2" title="Show All S M S Model">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All S M S Model
                </a>

                <a href="{{ route('s_m_s_models.s_m_s_model.create') }}" class="btn btn-success" title="Create New S M S Model">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New S M S Model
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

            <form method="POST" action="{{ route('s_m_s_models.s_m_s_model.update', $sMSModel->id) }}" id="edit_s_m_s_model_form" name="edit_s_m_s_model_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('s_m_s_models.form', [
                                        'sMSModel' => $sMSModel,
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
