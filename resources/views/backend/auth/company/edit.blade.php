
@extends('backend.layouts.app')

@section('title', __('biodata.Update Company'))

@section('content')
    <x-forms.patch :action="route('admin.company.update',[$company->c_id])" enctype="multipart/form-data">
        <x-backend.card>
            <x-slot name="header">
                @lang('biodata.Update Company')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.company.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div x-data="{userType : ''}">
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('biodata.Company Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{$company->c_name}}" maxlength="100" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label">@lang('biodata.Company Email')</label>

                        <div class="col-md-10">
                            <input type="text" name="email" class="form-control" placeholder="{{ __('Email') }}" value="{{$company->c_email}}" maxlength="100" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="logo" class="col-md-2 col-form-label">@lang('biodata.Company Logo')</label>

                        <div class="col-md-10">
                        <input type="file" name="logo" id="logo" class="" value="" accept="image/*">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="website" class="col-md-2 col-form-label">@lang('biodata.Company Website')</label>

                        <div class="col-md-10">
                            <input type="text" name="website" class="form-control" placeholder="{{ __('Website.com') }}" value="{{$company->c_website}}" maxlength="100" required />
                        </div>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection