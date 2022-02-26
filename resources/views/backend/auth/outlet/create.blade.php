
@extends('backend.layouts.app')

@section('title', __('Tambah Outlet'))


@section('content')
    <x-forms.post :action="route('admin.outlet.store')" enctype="multipart/form-data" name="form" id="form">
        <x-backend.card>
            <x-slot name="header">
                @lang('Tambah Outlet')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.outlet.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div x-data="{userType : ''}">
                    <div class="form-group row">
                        <label for="nmoutlet" class="col-md-2 col-form-label">@lang('Nama Outlet')</label>

                        <div class="col-md-10">
                            <input type="text" name="nmoutlet" class="form-control" placeholder="{{ __('Nama Outlet') }}" value="" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-md-2 col-form-label">@lang('Alamat')</label>

                        <div class="col-md-10">
                            <input type="text" name="alamat" class="form-control" placeholder="{{ __('Alamat') }}" value="" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="aktif" class="col-md-2 col-form-label">@lang('Aktif')</label>

                        <div class="col-md-10">
                        <select name="aktif" class="form-control">
                            <option value="0" >Aktif</option>
                            <option value="1" >Non-Aktif</option>
                        </select>
                        </div>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm  ml-2 btn-primary float-right" type="submit">@lang('Tambah')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
