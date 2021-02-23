@extends('layout.default')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($assetCategory->name) ? $assetCategory->name : 'Asset Category' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('asset_categories.asset_category.destroy', $assetCategory->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('asset_categories.asset_category.index') }}" class="btn btn-primary mr-2" title="Show All Asset Category">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Asset Category
                    </a>

                    <a href="{{ route('asset_categories.asset_category.create') }}" class="btn btn-success mr-2" title="Create New Asset Category">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Asset Category
                    </a>

                    <a href="{{ route('asset_categories.asset_category.edit', $assetCategory->id ) }}" class="btn btn-primary mr-2" title="Edit Asset Category">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Asset Category
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Asset Category" onclick="return confirm(&quot;Click Ok to delete Asset Category.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Asset Category
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $assetCategory->name }}</dd>
            <dt>Description</dt>
            <dd>{{ $assetCategory->description }}</dd>
            <dt>Is Active</dt>
            <dd>{{ ($assetCategory->is_active) ? 'Yes' : 'No' }}</dd>

        </dl>

    </div>
</div>

@endsection
