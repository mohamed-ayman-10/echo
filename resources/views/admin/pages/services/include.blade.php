@extends('admin.layouts.master')
@section('title', __('Include'))
@section('page-title', __('Include'))
@section('first-nav', __('Services'))
@section('last-nav', 'Include')
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header pb-0">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target=".bd-example-modal-lg">@lang('Add New Include')</a>
            </div>
            <div class="card-body">
                <div class="table-responsive theme-scrollbar">
                    <table class="display text-center" id="basic-1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('Title')</th>
                                <th>@lang('Created At')</th>
                                <th>@lang('Actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($includes as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->title() }}</td>
                                    <td>{{ $item->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="" class="btn btn-success" data-bs-toggle="modal"
                                            data-original-title="test" data-bs-target="#edit{{ $item->id }}"><i
                                                class="fa fa-edit"></i></a>
                                        <a href="" class="btn btn-danger" data-bs-toggle="modal"
                                            data-original-title="test" data-bs-target="#delete{{ $item->id }}"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                {{-- Edit Car Size --}}
                                <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">@lang('Edit Include')</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('admin.services.include.update', $item->id) }}"
                                                method="post" autocomplete="off" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="form-label">@lang('Title In Arabic')</label>
                                                        <input type="text" name="title_ar" value="{{ $item->title_ar }}"
                                                            class="form-control" placeholder="@lang('Title In Arabic')">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">@lang('Title In English')</label>
                                                        <input type="text" name="title_en" value="{{ $item->title_en }}"
                                                            class="form-control" placeholder="@lang('Title In English')">
                                                    </div>
                                                </div>
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
                                {{-- Delete Service --}}
                                <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">@lang('Delete Include')</h5>
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
                                                <form action="{{ route('admin.services.include.destroy', $item->id) }}"
                                                    id="formDelete{{ $item->id }}" method="post">@csrf
                                                    @method('DELETE')</form>
                                                <button type="submit" form="formDelete{{ $item->id }}"
                                                    class="btn btn-primary" type="submit">@lang('Delete')</button>
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
        {{-- Create Service --}}
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">@lang('Add New Include')</h4>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.services.include.store') }}" method="post" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="service_id" value="{{ $id }}">
                        <div class="modal-body">
                            <div class="">
                                <div class="form-group">
                                    <label class="form-label">@lang('Title In Arabic')</label>
                                    <input type="text" name="title_ar" class="form-control"
                                        placeholder="@lang('Title In Arabic')">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">@lang('Title In English')</label>
                                    <input type="text" name="title_en" class="form-control"
                                        placeholder="@lang('Title In English')">
                                </div>
                            </div>
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
