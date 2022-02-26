
@extends('backend.layouts.app')

@section('title', __('Tambah Diskon'))


@section('content')
    <x-forms.post :action="route('admin.diskon.store')" enctype="multipart/form-data" name="form" id="form">
        <x-backend.card>
            <x-slot name="header">
                @lang('Tambah Diskon')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.diskon.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div x-data="{userType : ''}">
                    <div class="form-group row">
                        <label for="kdoutlet" class="col-md-2 col-form-label">@lang('Outlet')</label>

                        <div class="col-md-10">
                        <select name="kdoutlet" class="form-control">
                            @foreach($outlets as $outlet)
                            <option value="{{$outlet->kdoutlet}}" >{{$outlet->nmoutlet}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="awal" class="col-md-2 col-form-label">@lang('Awal')</label>

                        <div class="col-md-10">
                            <input type="date" name="awal" class="form-control" placeholder="" value="" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="akhir" class="col-md-2 col-form-label">@lang('Akhir')</label>

                        <div class="col-md-10">
                            <input type="date" name="akhir" class="form-control" placeholder="" value="" required />
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
