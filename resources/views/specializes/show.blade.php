@extends('layout.default')

@section('content')

    <div class="card">
        <div class="card-header">

            <h5 class="my-1 float-left">{{ isset($specialize->name) ? $specialize->name : 'Specialize' }}</h5>

            <div class="float-right">

                <form method="POST" action="{!! route('specializes.specialize.destroy', $specialize->id) !!}"
                      accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('specializes.specialize.index') }}" class="btn btn-primary mr-2"
                           title="Show All Specialize">
                            <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                            Show All Specialize
                        </a>

                        <a href="{{ route('specializes.specialize.create') }}" class="btn btn-success mr-2"
                           title="Create New Specialize">
                            <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                            Create New Specialize
                        </a>

                        <a href="{{ route('specializes.specialize.edit', $specialize->id ) }}"
                           class="btn btn-primary mr-2" title="Edit Specialize">
                            <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                            Edit Specialize
                        </a>

                        <button type="submit" class="btn btn-danger" title="Delete Specialize"
                                onclick="return confirm(&quot;Click Ok to delete Specialize.?&quot;)">
                            <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                            Delete Specialize
                        </button>
                    </div>
                </form>

            </div>

        </div>

        <div class="card-body">
            <dl class="dl-horizontal">
                <dt>Name</dt>
                <dd>{{ $specialize->name }}</dd>

            </dl>

        </div>
    </div>

@endsection
