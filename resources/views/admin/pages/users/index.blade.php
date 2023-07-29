@extends('admin.layouts.master')
@section('title', __('Users'))
@section('page-title', __('Users'))
@section('first-nav', __('Users'))
{{--@section('last-nav', 'Dashboard')--}}
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header pb-0">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test"
                   data-bs-target="#addUser">@lang('Add New User')</a>
            </div>
            <div class="card-body">
                <div class="table-responsive theme-scrollbar">
                    <table class="display text-center" id="basic-1">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('Name')</th>
                            <th>@lang('Email')</th>
                            <th>@lang('Actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\Models\User::all() as $index=>$item)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    <ul class="action d-flex align-items-center justify-content-center">
                                        <li class="edit">
                                            <a href="#" data-bs-toggle="modal" data-original-title="test"
                                               data-bs-target="#edit{{$item->id}}">
                                                <i class="icon-pencil-alt"></i>
                                            </a>
                                        </li>
                                        <li class="delete">
                                            <a href="#" data-bs-toggle="modal" data-original-title="test"
                                               data-bs-target="#delete{{$item->id}}">
                                                <i class="icon-trash"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            {{-- Edit User --}}
                            <div class="modal fade" id="edit{{$item->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">@lang('Edit User')</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <form action="{{route('admin.users.update')}}" method="post" autocomplete="off">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="form-label">@lang('Name')</label>
                                                    <input type="text" name="name" class="form-control"
                                                           value="{{old('name', $item->name)}}"
                                                           placeholder="@lang('Name')" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">@lang('Email')</label>
                                                    <input type="email" name="email" class="form-control"
                                                           value="{{old('email', $item->email)}}"
                                                           placeholder="@lang('Email')" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">@lang('Password')</label>
                                                    <input type="password" name="password" class="form-control"
                                                           placeholder="@lang('Password')" autocomplete="new-password">
                                                </div>
                                                <input type="hidden" name="id" value="{{$item->id}}">
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-danger" type="button" data-bs-dismiss="modal">
                                                    @lang('Close')
                                                </button>
                                                <button class="btn btn-primary" type="submit">@lang('Update')</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- Delete User --}}
                            <div class="modal fade" id="delete{{$item->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">@lang('Delete User')</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @lang('Are You Sure Delete:') {{$item->name}}!
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">
                                                @lang('Close')
                                            </button>
                                            <a href="{{route('admin.users.destroy', $item->id)}}"
                                               class="btn btn-primary" type="submit">@lang('Delete')</a>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- Create User --}}
        <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('Add New User')</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('admin.users.store')}}" method="post" autocomplete="off">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">@lang('Name')</label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}"
                                       placeholder="@lang('Name')" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">@lang('Email')</label>
                                <input type="email" name="email" class="form-control" value="{{old('email')}}"
                                       placeholder="@lang('Email')" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">@lang('Password')</label>
                                <input type="password" name="password" class="form-control"
                                       placeholder="@lang('Password')" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">@lang('Close')</button>
                            <button class="btn btn-primary" type="submit">@lang("Add")</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
