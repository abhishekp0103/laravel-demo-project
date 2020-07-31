<!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
            
            $(document).on("click",".status",function(){
                var id=$(this).attr('id');
                var selector = "#"+id;
                console.log(id);

                $.ajax({
                    "url": "{{ url('/admin/updateState') }}"+ '/' +id,
                    "type": "POST",
                    "dataType":"json",
                    "data":{ _token: "{{csrf_token()}}",
                           },
                    success:function(result)
                    {
                       // alert(result+" hello");
                        if(result.flag){
                            $(".flash-msg").addClass('alert-success');
                            $(".flash-msg").html("Status Changed");
                            if(result.new_status == "Y"){
                            $(selector).removeClass('btn-warning');
                            $(selector).addClass('btn-success');
                            $(selector).text('Approved');
                            }else{
                                $(selector).removeClass('btn-success');
                                $(selector).addClass('btn-warning');
                                $(selector).text('Approval Pending');
                            }
                        }else{
                            $(".flash-msg").addClass('alert-danger');
                            $(".flash-msg").html("Error While Saving Data");
                        }
                    }
                });
            });

    });
</script>  

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="flash-msg alert text-center">
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>User Listing</strong>
                </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                         <thead>
                          <tr>
                           <th>Username</th>
                           <th>Email</th>
                           <th>Created Date</th>
                           <th>Status</th>
                          </tr>
                         </thead>
                         <tbody>
                            @foreach($users as $user)
                               <tr>
                                 <td>{{$user->name}} </td>
                                 <td>{{$user->email}} </td>
                                 <td>{{$user->created_at}} </td>
                                 <td><button class="status btn {{$user->is_approved === 'N' ? 'btn-warning':'btn-success'}}" id="{{$user->id}}">{{$user->is_approved == 'N'? 'Approval Pending':'Approved'}}</button></td>
                               </tr>
                            @endforeach
                         </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
