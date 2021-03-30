@extends('layouts.admin.app_pos')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($attribute->name) ? $attribute->name : 'Attribute' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('attributes.attribute.destroy', $attribute->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('attributes.attribute.index') }}" class="btn btn-primary mr-2" title="Show All Attribute">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Attribute
                    </a>

                    <a href="{{ route('attributes.attribute.create') }}" class="btn btn-success mr-2" title="Create New Attribute">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Attribute
                    </a>

                    <a href="{{ route('attributes.attribute.edit', $attribute->id ) }}" class="btn btn-primary mr-2" title="Edit Attribute">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Attribute
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Attribute" onclick="return confirm(&quot;Click Ok to delete Attribute.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Attribute
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $attribute->name }}</dd>

        </dl>

    </div>
</div>

@endsection
