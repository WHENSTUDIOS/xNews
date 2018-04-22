<table class="table table-hover" id="notices">
                        <tbody>
                        @if(count($notices) <= 0)
                            <center>No notices to display.</center>
                            <br>
                            @else  
                            <tr>
                                <th>Template Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                                @foreach($notices as $notice)
                                    <tr id="l{{$notice->id}}">
                                        <td>{{$notice->name}}</td>
                                        <td>
                                            @if($notice->status == '0')
                                            Inactive
                                            @elseif($notice->status == '1')
                                            Active
                                            @endif
                                        </td>
                                        @if($notice->status == '0')
                                        <form action="{{url('dashboard/content/notices/active/'.$notice->id)}}" method="POST" style="display:inline !important;">
                                        @csrf
                                        <input name="_method" type="hidden" value="PUT">
                                        <td><input type="submit" class="btn btn-primary btn-xs" value="Make Active"> |
                                        </form>
                                        @elseif($notice->status == '1')
                                        <form action="{{url('dashboard/content/notices/inactive/'.$notice->id)}}" method="POST" style="display:inline !important;">
                                        @csrf
                                        <input name="_method" type="hidden" value="PUT">
                                        <td><input type="submit" class="btn btn-warning btn-xs" value="Make Inactive"> |
                                        </form>
                                        @endif
                                        <form style="display:inline !important;" action="{{url('dashboard/content/notices/delete/'.$notice->id)}}" method="POST">
                                        @csrf
                                        <button data-toggle="modal" data-target="#delete{{$notice->id}}" type="button" class="btn btn-danger btn-xs" value="Delete">Delete</button></td>
                                        </form>
                                    </tr>
                                    <div class="modal modal-danger fade" id="delete{{$notice->id}}" data-vivaldi-spatnav-clickable="1" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title"><span class="fa fa-exclamation-triangle"></span>&nbsp;Confirm Deletion</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>You are about to delete <strong>{{$notice->name}}</strong>. This cannot be undone. Are you sure you want to proceed?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                                                    <button type="button" onclick="deleteNotice('{{$notice->id}}')" class="btn btn-outline" data-token="{{csrf_token()}}">Delete</button>
                                                </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                            </div>
                                @endforeach
                            @endif
                        </tbody>
                    </table>