@extends('layouts.master')
@section('title')
    @lang('site.content.user_permission_title')
@endsection
@section('content')

    <div class="row">
        <div class="col-md-6">
            <p><a href="{{route('user-role')}}" class="btn btn-danger btn-labeled"><b><i class="icon-previous2"></i></b> @lang('site.content.user_role_go')</a></p>
        </div>
        <div class="col-md-6">

            @if ($errors->any())
                <div class="notification is-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">@lang('site.content.user_permission_page') for <b class="text-danger">{{$table->name}}</b></h6>
                </div>
                <form action="{{route('user-permission-update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="userRuleID" value="{{$table->id}}">
                <div class="panel-body">
                    <div class="row">
                        @php
                            $permission_list = collect($permissions)->chunk(10);
                            $permission_list->toArray();

                        //dd($permission_list);
                        @endphp

                        @foreach($permission_list as $contains)
                            <div class="col-md-3">

                                @foreach($contains as $row)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="access[]" class="styled" value="{{$row['access']}}" {{$table->check($table->id, $row['access']) ? 'checked' : ''}}>
                                            {{$row['name']}}
                                        </label>
                                    </div>
                                @endforeach

                            </div>
                        @endforeach
                    </div>

                </div>

                <div class="panel-footer">
                    <div class="heading-elements">
                        <button type="submit" id="pes" class="btn btn-primary heading-btn pull-right"><i class="icon-checkmark4"></i> Save changes</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script type="text/javascript" src="{{asset('public/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/js/plugins/forms/styling/switch.min.js')}}"></script>



    <script type="text/javascript">




    </script>

@endsection