@extends('admin.pos.master')

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

            <h5  class="my-1 float-left">Buy Sms</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('buy_sms.buy_sms.create') }}" class="btn btn-success" title="Create New Buy Sms">
                    <i class="fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Buy Sms
                </a>
            </div>

        </div>

        @if(count($buySmsObjects) == 0)
            <div class="card-body text-center">
                <h4>No Buy Sms Available.</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>এস এম এস এর সংখ্যা</th>
                            <th>মোবাইল</th>
                            <th>Is Granted</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($buySmsObjects as $buySms)
                        <tr>
                                <td>{{ $buySms->amount_of_sms }}</td>
                            <td>{{ $buySms->phone }}</td>
                            <td>{{ ($buySms->is_granted) ? 'Yes' : 'No' }}</td>

                            <td>

                                <form method="POST" action="{!! route('buy_sms.buy_sms.destroy', $buySms->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right " role="group">
                                        <a href="{{ route('buy_sms.buy_sms.show', $buySms->id ) }}"title="Show Buy Sms">
                                            <i class="fa fa-eye text-info" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('buy_sms.buy_sms.edit', $buySms->id ) }}" class="mx-4" title="Edit Buy Sms">
                                            <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" style="border: none;background: transparent"  title="Delete Buy Sms" onclick="return confirm(&quot;Click Ok to delete Buy Sms.&quot;)">
                                            <i class=" fas  fa-trash text-danger" aria-hidden="true"></i>
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

        <div class="card-footer">
            {!! $buySmsObjects->render() !!}
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


