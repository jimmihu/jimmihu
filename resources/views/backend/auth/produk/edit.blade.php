
@extends('backend.layouts.app')

@section('title', __('Edit Produk'))


@section('content')
    <x-forms.patch :action="route('admin.produk.update',[$produk->kdproduk])" name="form" id="form">
        <x-backend.card>
            <x-slot name="header">
                @lang('Edit Produk')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.produk.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div x-data="{userType : ''}">
                <div class="form-group row">
                        <label for="nmproduk" class="col-md-2 col-form-label">@lang('Nama Produk')</label>

                        <div class="col-md-10">
                            <input type="text" name="nmproduk" class="form-control" placeholder="{{ __('Nama produk') }}" value="{{$produk->nmproduk}}" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hna" class="col-md-2 col-form-label">@lang('Content')</label>

                        <div class="col-md-10">
                            <input type="text" name="hna" class="form-control" placeholder="{{ __('HNA') }}" value="{{$produk->hna}}" required />
                        </div>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm  ml-2 btn-primary float-right" type="submit">@lang('Edit')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection