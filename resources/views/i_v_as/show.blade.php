@extends('layout.default')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($iVA->name) ? $iVA->name : 'I V A' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('i_v_as.i_v_a.destroy', $iVA->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('i_v_as.i_v_a.index') }}" class="btn btn-primary mr-2" title="Show All I V A">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All I V A
                    </a>

                    <a href="{{ route('i_v_as.i_v_a.create') }}" class="btn btn-success mr-2" title="Create New I V A">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New I V A
                    </a>

                    <a href="{{ route('i_v_as.i_v_a.edit', $iVA->id ) }}" class="btn btn-primary mr-2" title="Edit I V A">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit I V A
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete I V A" onclick="return confirm(&quot;Click Ok to delete I V A.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete I V A
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $iVA->name }}</dd>
            <dt>Vat</dt>
            <dd>{{ $iVA->vat }}</dd>
            <dt>Note</dt>
            <dd>{{ $iVA->note }}</dd>

        </dl>

    </div>
</div>

@endsection
