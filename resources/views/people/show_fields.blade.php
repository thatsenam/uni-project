<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $person->name }}</p>
</div>

<!-- Age Field -->
<div class="col-sm-12">
    {!! Form::label('age', 'Age:') !!}
    <p>{{ $person->age }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $person->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $person->updated_at }}</p>
</div>

