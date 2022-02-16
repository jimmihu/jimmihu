
@extends('backend.layouts.app')

@section('title', __('Add New'))


@section('content')
    <x-forms.post :action="route('admin.post.store')" enctype="multipart/form-data" name="form" id="form">
        <x-backend.card>
            <x-slot name="header">
                @lang('Add New')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.post.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div x-data="{userType : ''}">
                    <div class="form-group row">
                        <label for="title" class="col-md-2 col-form-label">@lang('Title')</label>

                        <div class="col-md-10">
                            <input type="text" name="title" minlength="20" class="form-control" placeholder="{{ __('Title') }}" value="" maxlength="100" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-md-2 col-form-label">@lang('Content')</label>

                        <div class="col-md-10">
                            <input type="text" name="content" minlength="200" class="form-control" placeholder="{{ __('Content') }}" value="" maxlength="1000" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category" class="col-md-2 col-form-label">@lang('Category')</label>

                        <div class="col-md-10">
                            <input type="text" name="category" minlength="3" class="form-control" placeholder="{{ __('Category') }}" value="" maxlength="100" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-md-2 col-form-label">@lang('Status')</label>

                        <div class="col-md-10">
                        <select name="status" id="status" class="form-control">
                            <option value="publish" selected='selected'>Publish</option>
                            <option value="draft" >Draft</option>
                        </select>
                        </div>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <button id="publish" name="publish" value="publish" class="btn btn-sm  ml-2 btn-primary float-right" type="submit">@lang('Add')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
