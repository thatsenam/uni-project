@extends('layout.default')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">{{ !empty($assetCategory->name) ? $assetCategory->name : 'Asset Category' }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('asset_categories.asset_category.index') }}" class="btn btn-primary mr-2" title="Show All Asset Category">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Asset Category
                </a>

                <a href="{{ route('asset_categories.asset_category.create') }}" class="btn btn-success" title="Create New Asset Category">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Asset Category
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

            <form method="POST" action="{{ route('asset_categories.asset_category.update', $assetCategory->id) }}" id="edit_asset_category_form" name="edit_asset_category_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('asset_categories.form', [
                                        'assetCategory' => $assetCategory,
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
