{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div id="target"></div>

    @verbatim
        <script id="template" type="text/ractive">
        <div class="row">
            <div class="col">
                <input type="text" class=" form-control" placeholder="Person Name" value="{{name}}">
            </div>
            <div class="col">
                <button id="addPersonBtn" class="btn btn-primary" onclick="addUser()">Add Person</button>
            </div>
        </div>
	    <h1>{{greeting}}, {{name}}!</h1>
        {{#each users:index}}
            <ul class="list-group">
              <li class="list-group-item"><b>{{  name  }}</b> - {{  phone  }}</li>
            </ul>
        {{/each}}
        </script>
    @endverbatim




@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script>

        var ui = Ractive({
            target: "#target",
            template: "#template",
            data: {greeting: 'Hello', name: 'world', persons: ["Chandler Being", "Monica"], users: []}
        });

        async function loadFakeUsers() {
            let res = await fetch('https://jsonplaceholder.typicode.com/users');
            let users = await res.json();
            ui.set('users', users);
        }

        loadFakeUsers();

        function addUser() {
            let name = ui.get('name');
            if (!name) return;
            let users = ui.get('users');
            users.unshift({name: name});
            ui.set('name', '');
            ui.set('users', users);
        }



    </script>
@endsection
