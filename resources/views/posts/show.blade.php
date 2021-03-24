@extends('layout.default')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($post->title) ? $post->title : 'Post' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('posts.post.destroy', $post->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('posts.post.index') }}" class="btn btn-primary mr-2" title="Show All Post">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Post
                    </a>

                    <a href="{{ route('posts.post.create') }}" class="btn btn-success mr-2" title="Create New Post">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Post
                    </a>

                    <a href="{{ route('posts.post.edit', $post->id ) }}" class="btn btn-primary mr-2" title="Edit Post">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Post
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Post" onclick="return confirm(&quot;Click Ok to delete Post.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Post
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Title</dt>
            <dd>{{ $post->title }}</dd>
            <dt>Description</dt>
            <dd>{{ $post->description }}</dd>

        </dl>

    </div>
</div>

@endsection
