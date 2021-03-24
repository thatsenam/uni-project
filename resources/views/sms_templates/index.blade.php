@extends('layouts.admin.app')

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

            <h5  class="my-1 float-left">Sms Templates</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('sms_templates.sms_template.create') }}" class="btn btn-success" title="Create New Sms Template">
                    <i class="fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Sms Template
                </a>
            </div>

        </div>

        @if(count($smsTemplates) == 0)
            <div class="card-body text-center">
                <h4>No Sms Templates Available.</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>Title</th>
                            <th>Body</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($smsTemplates as $smsTemplate)
                        <tr>
                                <td>{{ $smsTemplate->title }}</td>
                            <td>{{ $smsTemplate->body }}</td>

                            <td>

                                <form method="POST" action="{!! route('sms_templates.sms_template.destroy', $smsTemplate->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right " role="group">
                                        <a href="{{ route('sms_templates.sms_template.show', $smsTemplate->id ) }}"title="Show Sms Template">
                                            <i class="fa fa-eye text-info" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('sms_templates.sms_template.edit', $smsTemplate->id ) }}" class="mx-4" title="Edit Sms Template">
                                            <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" style="border: none;background: transparent"  title="Delete Sms Template" onclick="return confirm(&quot;Click Ok to delete Sms Template.&quot;)">
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
            {!! $smsTemplates->render() !!}
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


