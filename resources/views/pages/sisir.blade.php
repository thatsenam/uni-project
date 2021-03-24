@extends('layout.default')

{{-- Content --}}
@section('content')

    <div id="content">

    </div>
    <button class="btn btn-primary" onclick="loadData()"> Fetch Data</button>
@endsection

@section('scripts')
    <script type="text/javascript">
        let divEl = document.getElementById('content')

        async function loadData() {
            let response = await fetch('https://jsonplaceholder.typicode.com/todos');
            let todos = await response.json();

            todos.forEach(function (item, index) {
                divEl.innerHTML = divEl.innerHTML + `<div> <p class="id">${item.id}</p> <p class="title">${item.title}</p> <p class="completed">${item.completed}</p> </div>`;

                console.log(item, index)
            })

            console.log(todos)


        }


    </script>
@endsection

