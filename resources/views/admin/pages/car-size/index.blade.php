@extends('admin.layouts.master')
@section('title', __('Car Sizes'))
@section('page-title', __('Car Sizes'))
@section('first-nav', __('Car Sizes'))
{{--@section('last-nav', 'Dashboard')--}}
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header pb-0">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test"
                   data-bs-target="#addcar-size">@lang('Add New Size')</a>
            </div>
            <div class="card-body">
                <div class="table-responsive theme-scrollbar">
                    <table class="display text-center" id="basic-1">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('Title')</th>
                            <th>@lang('Actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\Models\CarSize::all() as $index=>$item)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$item->title()}}</td>
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
                            {{-- Edit Car Size --}}
                            <div class="modal fade" id="edit{{$item->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">@lang('Edit Car Size')</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <form action="{{route('admin.car-size.update')}}" method="post" autocomplete="off">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="form-label">@lang('Title In Arabic')</label>
                                                    <input type="text" name="title_ar" class="form-control" value="{{old('title_ar', $item->title_ar)}}"
                                                           placeholder="@lang('Title In Arabic')" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">@lang('Title In English')</label>
                                                    <input type="text" name="title_en" class="form-control" value="{{old('title_en', $item->title_en)}}"
                                                           placeholder="@lang('Title In English')" required>
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
                            {{-- Delete Car Size --}}
                            <div class="modal fade" id="delete{{$item->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">@lang('Delete Car Size')</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @lang('Are You Sure Delete:') {{$item->title()}}!
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">
                                                @lang('Close')
                                            </button>
                                            <a href="{{route('admin.car-size.destroy', $item->id)}}"
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
        {{-- Create Car Size --}}
        <div class="modal fade" id="addcar-size" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('Add New Size')</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('admin.car-size.store')}}" method="post" autocomplete="off">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">@lang('Title In Arabic')</label>
                                <input type="text" name="title_ar" class="form-control" value="{{old('title_ar')}}"
                                       placeholder="@lang('Title In Arabic')" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">@lang('Title In English')</label>
                                <input type="text" name="title_en" class="form-control" value="{{old('title_en')}}"
                                       placeholder="@lang('Title In English')" required>
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
