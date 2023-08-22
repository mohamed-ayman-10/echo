@extends('admin.layouts.master')
@section('title', __('Services'))
@section('page-title', __('Services'))
@section('first-nav', __('Services'))
{{-- @section('last-nav', 'Dashboard') --}}
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header pb-0">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target=".bd-example-modal-lg">@lang('Add New Service')</a>
            </div>
            <div class="card-body">
                <div class="table-responsive theme-scrollbar">
                    <table class="display text-center" id="basic-1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('Title')</th>
                                <th>@lang('Price')</th>
                                <th>@lang('Car Size')</th>
                                <th>@lang('Actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (\App\Models\Service::all() as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->title() }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->car_size->title() }}</td>
                                    <td>
                                        <div class="dropdown-basic">
                                            <div class="dropdown">
                                                <div class="btn-group mb-0">
                                                    <a class="dropbtn bg-transparent" type="button">
                                                        <span><i class="icon-more text-dark"></i></span></a>
                                                    <div class="dropdown-content">
                                                        <a href="{{ route('admin.services.material.show', $item->id) }}">
                                                            Material
                                                        </a>
                                                        <a href="{{ route('admin.services.include.show', $item->id) }}">
                                                            Include
                                                        </a>
                                                        <a href="#" data-bs-toggle="modal" data-original-title="test"
                                                            data-bs-target="#edit{{ $item->id }}">
                                                            Edit
                                                        </a>
                                                        <a href="#" class="" data-bs-toggle="modal"
                                                            data-original-title="test"
                                                            data-bs-target="#delete{{ $item->id }}">
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <ul class="action d-flex align-items-center justify-content-center">
                                            <li class="edit">
                                                <a href="#" data-bs-toggle="modal" data-original-title="test"
                                                    data-bs-target="#edit{{ $item->id }}">
                                                    <i class="icon-pencil-alt1212 icon-more"></i>
                                                </a>
                                            </li>
                                            <li class="delete">
                                                <a href="#" data-bs-toggle="modal" data-original-title="test"
                                                    data-bs-target="#delete{{ $item->id }}">
                                                    <i class="icon-trash"></i>
                                                </a>
                                            </li>
                                        </ul> --}}
                                    </td>
                                </tr>
                                {{-- Edit Car Size --}}
                                <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">@lang('Edit Service')</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('admin.services.update') }}" method="post"
                                                autocomplete="off">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="form-label">@lang('Title In Arabic')</label>
                                                        <input type="text" name="title_ar" class="form-control"
                                                            value="{{ old('title_ar', $item->title_ar) }}"
                                                            placeholder="@lang('Title In Arabic')" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">@lang('Title In English')</label>
                                                        <input type="text" name="title_en" class="form-control"
                                                            value="{{ old('title_en', $item->title_en) }}"
                                                            placeholder="@lang('Title In English')" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">@lang('Description In Arabic')</label>
                                                        <textarea name="description_ar" class="form-control" placeholder="@lang('Description In Arabic')" required>{{ old('description_ar', $item->description_ar) }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">@lang('Description In English')</label>
                                                        <textarea name="description_en" class="form-control" placeholder="@lang('Description In English')" required>{{ old('description_en', $item->description_en) }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">@lang('Price')</label>
                                                        <input type="text" name="price" class="form-control"
                                                            value="{{ old('price', $item->price) }}"
                                                            placeholder="@lang('Price')" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">@lang('Car Sizes')</label>
                                                        <select name="car_size_id" required class="form-control">
                                                            @foreach (\App\Models\CarSize::all() as $size)
                                                                <option
                                                                    {{ $item->car_size_id == $size->id ? 'selected' : '' }}
                                                                    value="{{ $size->id }}">{{ $size->title() }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">@lang('Image')</label>
                                                        <input type="file" name="image" class="form-control"
                                                            accept="image/*">
                                                    </div>
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
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
                                                <h5 class="modal-title" id="exampleModalLabel">@lang('Delete Service')</h5>
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
                                                <a href="{{ route('admin.services.destroy', $item->id) }}"
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
        {{-- Create Service --}}
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">@lang('Add New Service')</h4>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.services.store') }}" method="post" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-label">@lang('Title In Arabic')</label>
                                    <input type="text" name="title_ar" class="form-control"
                                        value="{{ old('title_ar') }}" placeholder="@lang('Title In Arabic')" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label">@lang('Title In English')</label>
                                    <input type="text" name="title_en" class="form-control"
                                        value="{{ old('title_en') }}" placeholder="@lang('Title In English')" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">@lang('Description In Arabic')</label>
                                    <textarea name="description_ar" class="form-control" placeholder="@lang('Description In Arabic')" required>{{ old('description_ar') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">@lang('Description In English')</label>
                                    <textarea name="description_en" class="form-control" placeholder="@lang('Description In English')" required>{{ old('description_en') }}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label">@lang('Duration')</label>
                                    <input type="text" name="duration" class="form-control"
                                        value="{{ old('duration') }}" placeholder="@lang('Duration')" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label">@lang('Week')</label>
                                    <input type="text" name="week" class="form-control"
                                        value="{{ old('week') }}" placeholder="@lang('Week')" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label">@lang('Count')</label>
                                    <input type="text" name="count" class="form-control"
                                        value="{{ old('count') }}" placeholder="@lang('Count')" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label">@lang('Price')</label>
                                    <input type="text" name="price" class="form-control"
                                        value="{{ old('price') }}" placeholder="@lang('Price')" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label">@lang('Car Sizes')</label>
                                    <select name="car_size_id" required class="form-control">
                                        <option disabled selected>@lang('Car Sizes')</option>
                                        @foreach (\App\Models\CarSize::all() as $size)
                                            <option value="{{ $size->id }}">{{ $size->title() }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">@lang('Image')</label>
                                    <input type="file" name="image" class="form-control" required accept="image/*">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">@lang('Materials')</label>
                                    <input type="file" name="images[]" class="form-control" multiple
                                        accept="image/*">
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
