@extends('layout.default')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($medicine->name) ? $medicine->name : 'Medicine' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('medicines.medicine.destroy', $medicine->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('medicines.medicine.index') }}" class="btn btn-primary mr-2" title="Show All Medicine">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Medicine
                    </a>

                    <a href="{{ route('medicines.medicine.create') }}" class="btn btn-success mr-2" title="Create New Medicine">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Medicine
                    </a>

                    <a href="{{ route('medicines.medicine.edit', $medicine->id ) }}" class="btn btn-primary mr-2" title="Edit Medicine">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Medicine
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Medicine" onclick="return confirm(&quot;Click Ok to delete Medicine.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Medicine
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $medicine->name }}</dd>
            <dt>Price</dt>
            <dd>{{ $medicine->price }}</dd>

        </dl>

    </div>
</div>

@endsection
