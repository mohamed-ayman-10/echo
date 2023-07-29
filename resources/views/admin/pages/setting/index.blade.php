@extends('admin.layouts.master')
@section('title', __('Settings'))
@section('page-title', __('Settings'))
@section('first-nav', __('Settings'))
{{--@section('last-nav', 'Dashboard')--}}
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">@lang('Settings')</h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin.settings.storeAndUpdate')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">@lang('Title')</label>
                        <input type="text" name="title" value="{{old('title', $setting->title)}}" class="form-control" placeholder="@lang('Title')" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">@lang('Email')</label>
                        <input type="email" name="email" value="{{old('email', $setting->email)}}" class="form-control" placeholder="@lang('Email')" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">@lang('Phone')</label>
                        <input type="number" name="phone" value="{{old('phone', $setting->phone)}}" class="form-control" placeholder="@lang('Phone')" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">@lang('WhatsApp')</label>
                        <input type="text" name="whatsapp" value="{{old('whatsapp', $setting->whatsapp)}}" class="form-control" placeholder="@lang('WhatsApp')" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">@lang('Logo')</label>
                        <input type="file" name="logo" class="form-control" placeholder="@lang('Logo')">
                    </div>
                    <div class="form-group">
                        <label class="form-label">@lang('FavIcon')</label>
                        <input type="file" name="favicon" class="form-control" placeholder="@lang('FavIcon')">
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('Save')</button>
                </form>
            </div>
        </div>
@endsection
