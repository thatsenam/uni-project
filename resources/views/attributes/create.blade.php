@extends('layouts.admin.app_pos')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">Create New Attribute</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('attributes.attribute.index') }}" class="btn btn-primary" title="Show All Attribute">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Attribute
                </a>
            </div>

        </div>

        <div class="card-body">



            <form method="POST" action="{{ route('attributes.attribute.store') }}" accept-charset="UTF-8" id="create_attribute_form" name="create_attribute_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('attributes.form', [
                                        'attribute' => null,
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


