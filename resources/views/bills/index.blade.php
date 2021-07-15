@extends('layout.default')

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

            <h5  class="my-1 float-left">Bills</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('bills.bill.create') }}" class="btn btn-success" title="Create New Bill">
                    <i class="fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Bill
                </a>
            </div>

        </div>

        @if(count($bills) == 0)
            <div class="card-body text-center">
                <h4>No Bills Available.</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>Bill No</th>
                            <th>Room</th>
                            <th>Patient</th>
                            <th>Doctor Charge</th>
                            <th>Room Charge</th>
                            <th>Total Charge</th>
                            <th>Doctor</th>
                            <th>Bill By</th>
                            <th>Date</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($bills as $bill)
                        <tr>
                                <td>{{ $bill->bill_no }}</td>
                            <td>{{ optional($bill->room)->name }}</td>
                            <td>{{ optional($bill->patient)->name }}</td>
                            <td>{{ $bill->doctor_charge }}</td>
                            <td>{{ $bill->room_charge }}</td>
                            <td>{{ $bill->total_charge }}</td>
                            <td>{{ optional($bill->doctor)->name }}</td>
                            <td>{{ optional($bill->billBy)->id }}</td>
                            <td>{{ $bill->date }}</td>

                            <td>

                                <form method="POST" action="{!! route('bills.bill.destroy', $bill->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right " role="group">
                                        <a href="{{ route('bills.bill.show', $bill->id ) }}"title="Show Bill">
                                            <i class="fa fa-eye text-info" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('bills.bill.edit', $bill->id ) }}" class="mx-4" title="Edit Bill">
                                            <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" style="border: none;background: transparent"  title="Delete Bill" onclick="return confirm(&quot;Click Ok to delete Bill.&quot;)">
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
            {!! $bills->render() !!}
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


