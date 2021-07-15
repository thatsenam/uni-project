@extends('layout.default')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">Create New Medicine</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('medicines.medicine.index') }}" class="btn btn-primary" title="Show All Medicine">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Medicine
                </a>
            </div>

        </div>

        <div class="card-body">



            <form method="POST" action="{{ route('medicines.medicine.store') }}" accept-charset="UTF-8" id="create_medicine_form" name="create_medicine_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('medicines.form', [
                                        'medicine' => null,
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


