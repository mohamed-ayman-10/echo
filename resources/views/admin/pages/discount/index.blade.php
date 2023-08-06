@extends('admin.layouts.master')
@section('title', __('Offers'))
@section('page-title', __('Offers'))
@section('first-nav', __('Offers'))
{{-- @section('last-nav', 'Dashboard') --}}
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header pb-0">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test"
                   data-bs-target="#addUser">@lang('Add New Offer')</a>
            </div>
            <div class="card-body">
                <div class="table-responsive theme-scrollbar">
                    <table class="display text-center" id="basic-1">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('Discount')</th>
                            <th>@lang('Service')</th>
                            <th>@lang('Actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($offers as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>%{{ $item->discount }}</td>
                                <td>{{ $item->service->title() }}</td>
                                <td>
                                    <ul class="action d-flex align-items-center justify-content-center gap-1">
                                        <li class="">
                                            <a href="#" class="btn btn-outline-primary"
                                               data-bs-toggle="modal" data-original-title="test"
                                               data-bs-target="#edit{{ $item->id }}">
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
                                            <h5 class="modal-title" id="exampleModalLabel">@lang('Edit Car Brand')</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('admin.discount.update', $item->id) }}" method="post"
                                              autocomplete="off">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="form-label">@lang('Discount')</label>
                                                    <input type="number" name="discount" class="form-control"
                                                           value="{{ old('discount', $item->discount) }}" placeholder="@lang('Discount')"
                                                           required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">@lang('Service')</label>
                                                    <select class="form-select" name="service_id">
                                                        <option selected disabled>@lang('Service')</option>
                                                        @foreach(\App\Models\Service::all() as $service)
                                                            <option {{ $item->service_id == $service->id ? 'selected' : '' }} value="{{$service->id}}">{{$service->title()}}</option>
                                                        @endforeach
                                                    </select>
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
                            {{-- Delete User --}}
                            <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="exampleModalLabel">@lang('Delete Offer') </h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @lang('Are You Sure Delete:')!
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">
                                                @lang('Close')
                                            </button>
                                            <button type="submit" form="formDelete{{ $item->id }}"
                                                    class="btn btn-primary" type="submit">@lang('Delete')</button>
                                            <form action="{{ route('admin.discount.destroy', $item->id) }}" method="post"
                                                  id="formDelete{{ $item->id }}">@csrf
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
                        <h5 class="modal-title" id="exampleModalLabel">@lang('Add New Offer')</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.discount.store') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">@lang('Discount')</label>
                                <input type="number" name="discount" class="form-control"
                                       value="{{ old('discount') }}" placeholder="@lang('Discount')"
                                       required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">@lang('Service')</label>
                                <select class="form-select" name="service_id">
                                    <option selected disabled>@lang('Service')</option>
                                    @foreach(\App\Models\Service::all() as $service)
                                        <option value="{{$service->id}}">{{$service->title()}}</option>
                                    @endforeach
                                </select>
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
