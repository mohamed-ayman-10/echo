@extends('admin.layouts.master')
@section('title', __('Car Models'))
@section('page-title', __('Car Models'))
@section('first-nav', __('Car Brand'))
@section('last-nav', 'Car Model')
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header pb-0">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test"
                    data-bs-target="#addUser">@lang('Add New Car Model')</a>
            </div>
            <div class="card-body">
                <div class="table-responsive theme-scrollbar">
                    <table class="display text-center" id="basic-1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('Title')</th>
                                <th>@lang('Brand')</th>
                                <th>@lang('Actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->title() }}</td>
                                    <td>{{ $item->brand->title() }}</td>
                                    <td>
                                        <ul class="action d-flex align-items-center justify-content-center gap-1">
                                            <li class="">
                                                <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal"
                                                    data-original-title="test" data-bs-target="#edit{{ $item->id }}">
                                                    <i class="icon-pencil-alt"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-original-title="test" data-bs-target="#delete{{ $item->id }}">
                                                    <i class="icon-trash"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                {{-- Edit User --}}
                                <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">@lang('Edit Car Model')</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('admin.model.update', $item->id) }}" method="post"
                                                autocomplete="off">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="form-label">@lang('Title In Arabic')</label>
                                                        <input type="text" name="title_ar"
                                                            value="{{ old('title_ar', $item->title_ar) }}"
                                                            class="form-control" value="{{ old('Title In Arabic') }}"
                                                            placeholder="@lang('Title In Arabic')" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">@lang('Title In English')</label>
                                                        <input type="text" name="title_en"
                                                            value="{{ old('title_en', $item->title_en) }}"
                                                            class="form-control" value="{{ old('Title In English') }}"
                                                            placeholder="@lang('Title In English')" required>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="brand_id" value="{{ $id }}">
                                                <div class="modal-footer">
                                                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">
                                                        @lang('Close')
                                                    </button>
                                                    <button class="btn btn-primary"
                                                        type="submit">@lang('Update')</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- Delete User --}}
                                <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">@lang('Delete Car Model') </h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @lang('Are You Sure Delete:') {{ $item->title() }}!
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-danger" type="button" data-bs-dismiss="modal">
                                                    @lang('Close')
                                                </button>
                                                <button type="submit" form="formDelete{{ $item->id }}"
                                                    class="btn btn-primary" type="submit">@lang('Delete')</button>
                                                <form action="{{ route('admin.model.destroy', $item->id) }}"
                                                    method="post" id="formDelete{{ $item->id }}">@csrf
                                                    @method('DELETE')</form>
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
                        <h5 class="modal-title" id="exampleModalLabel">@lang('Add New Car model')</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.model.store') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">@lang('Title In Arabic')</label>
                                <input type="text" name="title_ar" class="form-control"
                                    value="{{ old('Title In Arabic') }}" placeholder="@lang('Title In Arabic')" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">@lang('Title In English')</label>
                                <input type="text" name="title_en" class="form-control"
                                    value="{{ old('Title In English') }}" placeholder="@lang('Title In English')" required>
                            </div>
                            <input type="hidden" name="brand_id" value="{{ $id }}">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button"
                                data-bs-dismiss="modal">@lang('Close')</button>
                            <button class="btn btn-primary" type="submit">@lang('Add')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
