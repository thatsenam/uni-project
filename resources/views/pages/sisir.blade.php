@extends('layout.default')

{{-- Content --}}
@section('content')


    @verbatim
        <div id="app">
            <ol>
                <li v-for="todo in todos">
                    {{ todo.text }}
                </li>
            </ol>
            <p>{{ message }}</p>

            <input v-model="message">


            <button v-on:click="reverseMessage" class="btn btn-primary">Reverse Message</button>

        </div>
    @endverbatim
@endsection

@section('scripts')

    <script>
        var app = new Vue({
                el: '#app',
                data: {
                    todos: [
                        {text: 'Learn JavaScript'},
                        {text: 'Learn Vue'},
                        {text: 'Build something awesome'}
                    ], message: "Test Message"
                }
                ,
                methods: {
                    reverseMessage: function () {
                        this.message = this.message.split('').reverse().join('')
                    }
                }
            }
        )
    </script>


    {{--    <script type="text/javascript">--}}
    {{--        let divEl = document.getElementById('content')--}}

    {{--        async function loadData() {--}}

    {{--            swal.fire({--}}
    {{--                title: '<strong>HTML <u>example</u></strong>',--}}
    {{--                icon: 'info',--}}
    {{--                html:--}}
    {{--                    'You can use <b>bold text</b>, ' +--}}
    {{--                    '<a href="//sweetalert2.github.io">links</a> ' +--}}
    {{--                    'and other HTML tags',--}}
    {{--                showCloseButton: true,--}}
    {{--                showCancelButton: true,--}}
    {{--                focusConfirm: false,--}}
    {{--                confirmButtonText:--}}
    {{--                    '<i class="fa fa-thumbs-up"></i> Great!',--}}
    {{--                confirmButtonAriaLabel: 'Thumbs up, great!',--}}
    {{--                cancelButtonText:--}}
    {{--                    '<i class="fa fa-thumbs-down"></i>',--}}
    {{--                cancelButtonAriaLabel: 'Thumbs down'--}}
    {{--            })--}}

    {{--            let response = await fetch('https://jsonplaceholder.typicode.com/todos');--}}
    {{--            let todos = await response.json();--}}

    {{--            todos.forEach(function (item, index) {--}}
    {{--                divEl.innerHTML = divEl.innerHTML + `<div> <p class="id">${item.id}</p> <p class="title">${item.title}</p> <p class="completed">${item.completed}</p> </div>`;--}}

    {{--                console.log(item, index)--}}
    {{--            })--}}

    {{--            console.log(todos)--}}


    {{--        }--}}


    {{--    </script>--}}
@endsection

