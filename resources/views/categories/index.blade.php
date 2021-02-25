@extends('layout.default')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <i class=" fas fa-fw fa-check" aria-hidden="true"></i>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">Categories</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('categories.category.create') }}" class="btn btn-success" title="Create New Category">
                    <i class="fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Category
                </a>
            </div>

        </div>

        @if(count($categories) == 0)
            <div class="card-body text-center">
                <h4>No Categories Available.</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>Name</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                                <td>{{ $category->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('categories.category.destroy', $category->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right " role="group">
                                        <a href="{{ route('categories.category.show', $category->id ) }}" class="btn btn-icon btn-light-info " title="Show Category">
                                            <i class=" fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('categories.category.edit', $category->id ) }}" class="btn btn-icon btn-light-primary mx-2" title="Edit Category">
                                            <i class="fas fa-edit" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" class="btn btn-icon btn-light-danger" title="Delete Category" onclick="return confirm(&quot;Click Ok to delete Category.&quot;)">
                                            <i class=" fas  fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                    </div>

                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="card-footer">
            {!! $categories->render() !!}
        </div>

        @endif

    </div>
@endsection

@section('scripts')

    <script>
        $(document).ready(function () {
            $('table').DataTable( {
                responsive: true,
               "order": []

            } );
        });
    </script>


@endsection


