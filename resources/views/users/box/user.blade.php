@section('box')

    <!-- Basic modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-file-plus"></i> @lang('site.content.all_user_add')</h5>
                </div>

                <form action="{{route('users-save')}}" method="post" enctype="multipart/form-data"  autocomplete="off">
                    @csrf
                    <div class="modal-body">

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Set User Type*</span>
                            <select type="text" name="userType" class="form-control" required>
                                <option value="Customer">Customer</option>
                                <option value="Agent">Agent</option>
                                <option value="Admin">Admin</option>
                                <option value="Super Admin">Super Admin</option>
                            </select>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">User Role</span>
                            <select type="text" name="userRuleID" class="form-control">
                                <option value="">User Role [Optional]</option>
                                @foreach($roles as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="input-group mb-5">
                            <span class="input-group-addon">Name*</span>
                            <input type="text" name="name" class="form-control" placeholder="User Full Name" required />
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Contact*</span>
                            <input type="text" name="contact" class="form-control" placeholder="11 Digit Mobile Number" required />
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Email*</span>
                            <input type="email" name="email" class="form-control" placeholder="Email Address" required/>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Password*</span>
                            <input type="password" name="password" class="form-control" placeholder="Minimum 8 password" required/>
                        </div>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Password Confirm*</span>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" required/>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="icon-checkmark4"></i> Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /basic modal -->


    <!-- Basic Edi modal -->
    <div id="ediModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-pencil7"></i> @lang('site.content.all_user_edi')</h5>
                </div>

                <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">

                            <div class="input-group mb-5">
                                <span class="input-group-addon">Set User Type*</span>
                                <select type="text" name="userType" class="form-control" required>
                                    <option value="Customer">Customer</option>
                                    <option value="Agent">Agent</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Super Admin">Super Admin</option>
                                </select>
                            </div>

                            <div class="input-group mb-5">
                                <span class="input-group-addon">User Role</span>
                                <select type="text" name="userRuleID" class="form-control">
                                    <option value="">User Role [Optional]</option>
                                    @foreach($roles as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="input-group mb-5">
                                <span class="input-group-addon">Name*</span>
                                <input type="text" name="name" class="form-control" placeholder="User Full Name" required />
                            </div>

                            <div class="input-group mb-5">
                                <span class="input-group-addon">Contact*</span>
                                <input type="text" name="contact" class="form-control" placeholder="11 Digit Mobile Number" required />
                            </div>

                            <div class="input-group mb-5">
                                <span class="input-group-addon">Email*</span>
                                <input type="email" name="email" class="form-control" placeholder="Email Address" required />
                            </div>

                            <div class="input-group mb-5">
                                <span class="input-group-addon">Password*</span>
                                <input type="password" name="password" class="form-control" placeholder="Minimum 8 password" required />
                            </div>

                            <div class="input-group mb-5">
                                <span class="input-group-addon">Password Confirm*</span>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" required />
                            </div>



                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="icon-checkmark4"></i> Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /basic Edi modal -->


@endsection
