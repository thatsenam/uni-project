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

            <h5  class="my-1 float-left">S M S Models</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('s_m_s_models.s_m_s_model.create') }}" class="btn btn-success" title="Create New S M S Model">
                    <i class="fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New S M S Model
                </a>
            </div>

        </div>

        @if(count($sMSModels) == 0)
            <div class="card-body text-center">
                <h4>No S M S Models Available.</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>এস এম এস টেমপ্লেট</th>
                            <th>Sms Contact</th>
                            <th>সকল সরবরাহকারি ?</th>
                            <th>সকল গ্রাহক ?</th>
                            <th>Is Sent</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($sMSModels as $sMSModel)
                        <tr>
                                <td>{{ optional($sMSModel->smsTemplate)->title }}</td>
                            <td>{{ optional($sMSModel->smsContact)->name }}</td>
                            <td>{{ ($sMSModel->is_all_supplier) ? 'Yes' : 'No' }}</td>
                            <td>{{ ($sMSModel->is_all_customer) ? 'Yes' : 'No' }}</td>
                            <td>{{ ($sMSModel->is_sent) ? 'Yes' : 'No' }}</td>

                            <td>

                                <form method="POST" action="{!! route('s_m_s_models.s_m_s_model.destroy', $sMSModel->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right " role="group">
                                        <a href="{{ route('s_m_s_models.s_m_s_model.show', $sMSModel->id ) }}"title="Show S M S Model">
                                            <i class="fa fa-eye text-info" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('s_m_s_models.s_m_s_model.edit', $sMSModel->id ) }}" class="mx-4" title="Edit S M S Model">
                                            <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" style="border: none;background: transparent"  title="Delete S M S Model" onclick="return confirm(&quot;Click Ok to delete S M S Model.&quot;)">
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
            {!! $sMSModels->render() !!}
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


