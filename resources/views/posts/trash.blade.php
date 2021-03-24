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

            <h5  class="my-1 float-left text-danger">Trashed Posts</h5>

            <div class="btn-group btn-group-sm float-right " role="group">
                <a href="{{ route('posts.post.index') }}" class="btn btn-success" title="All Post">
                    <i class="fas fa-fw fa-list" aria-hidden="true"></i>
                    All Posts
                </a>
            </div>
            <div class="btn-group btn-group-sm float-right mr-2" role="group">
                <a href="{{ route('posts.post.trash') }}" class="btn btn-danger" title="All Post">
                    <i class="fas fa-fw fa-list" aria-hidden="true"></i>
                    Trash ({{ $posts->count() }})
                </a>
            </div>

        </div>

        @if(count($posts) == 0)
            <div class="card-body text-center">
                <h4>No Posts Available.</h4>
            </div>
        @else
        <div class="card-body ">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>Title</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                                <td>{{ $post->title }}</td>

                            <td>

                                <form method="POST" action="{!! route('posts.post.restore', $post->id) !!}" accept-charset="UTF-8">
{{--                                <input name="_method" value="DELETE" type="hidden">--}}
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right " role="group">

                                        <button type="submit" style="border: none;background: transparent"  title="Delete Post" onclick="return confirm(&quot;Click Ok to restore Post.&quot;)">
                                            <i class=" fas  fa-trash-restore text-success" aria-hidden="true"></i>
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



        @endif

    </div>
@endsection

@section('scripts')

     <script>
         $(document).ready(function () {
             $('table').DataTable({
                 responsive: true,
                 "order": [],
                 dom: 'lBfrtip',
                 buttons: [
                     'copy', 'excel', 'pdf', 'print'
                 ]

             });
         });
     </script>

     <style>
         .dataTables_filter {
             float: right;
         }
        i:hover { color: #0248fa !important; }

     </style>


@endsection


