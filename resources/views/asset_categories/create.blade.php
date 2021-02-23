@extends('layout.default')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">Create New Asset Category</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('asset_categories.asset_category.index') }}" class="btn btn-primary" title="Show All Asset Category">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Asset Category
                </a>
            </div>

        </div>

        <div class="card-body">



            <form method="POST" action="{{ route('asset_categories.asset_category.store') }}" accept-charset="UTF-8" id="create_asset_category_form" name="create_asset_category_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('asset_categories.form', [
                                        'assetCategory' => null,
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


