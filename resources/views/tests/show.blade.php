@extends('layout.default')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($title) ? $title : 'Test' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('tests.test.destroy', $test->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('tests.test.index') }}" class="btn btn-primary mr-2" title="Show All Test">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Test
                    </a>

                    <a href="{{ route('tests.test.create') }}" class="btn btn-success mr-2" title="Create New Test">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Test
                    </a>

                    <a href="{{ route('tests.test.edit', $test->id ) }}" class="btn btn-primary mr-2" title="Edit Test">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Test
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Test" onclick="return confirm(&quot;Click Ok to delete Test.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Test
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Test Name</dt>
            <dd>{{ $test->test_name }}</dd>
            <dt>Patient</dt>
            <dd>{{ optional($test->patient)->name }}</dd>
            <dt>Doctor</dt>
            <dd>{{ optional($test->doctor)->name }}</dd>
            <dt>Bill</dt>
            <dd>{{ optional($test->bill)->created_at }}</dd>
            <dt>Test Date</dt>
            <dd>{{ $test->test_date }}</dd>
            <dt>Test Result</dt>
            <dd>{{ $test->test_result }}</dd>

        </dl>

    </div>
</div>

@endsection
