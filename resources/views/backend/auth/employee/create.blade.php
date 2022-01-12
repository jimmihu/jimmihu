
@extends('backend.layouts.app')

@section('title', __('biodata.Add Employee'))

@section('content')
    <x-forms.post :action="route('admin.employee.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('biodata.Add Employee')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.company.show',[$company->c_id])" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div x-data="{userType : ''}">
                    <div class="form-group row">
                        <label for="f_name" class="col-md-2 col-form-label">@lang('biodata.Employee First Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="f_name" class="form-control" placeholder="{{ __('First Name') }}" value="" maxlength="100" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="l_name" class="col-md-2 col-form-label">@lang('biodata.Employee Last Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="l_name" class="form-control" placeholder="{{ __('Last Name') }}" value="" maxlength="100" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-md-2 col-form-label">@lang('biodata.Employee Phone')</label>

                        <div class="col-md-10">
                            <input type="text" name="phone" class="form-control" placeholder="{{ __('1234') }}" value="" maxlength="100" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label">@lang('biodata.Employee Email')</label>

                        <div class="col-md-10">
                            <input type="text" name="email" class="form-control" placeholder="{{ __('Email') }}" value="" maxlength="100" required />
                        </div>
                    </div>
                        <div class="col-md-10">
                            <input type="text" name="company" class="form-control" placeholder="" value="{{$company->c_id}}" maxlength="100" required hidden/>
                        </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('biodata.Add Employee')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
