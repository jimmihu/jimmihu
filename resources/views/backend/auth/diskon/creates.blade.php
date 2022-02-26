
@extends('backend.layouts.app')

@section('title', __('Tambah Diskon Produk'))


@section('content')
    <x-forms.post :action="route('admin.diskon.stores',[$diskon->nosurat])" enctype="multipart/form-data" name="form" id="form">
        <x-backend.card>
            <x-slot name="header">
                @lang('Tambah Diskon Produk')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.diskon.edit',[$diskon->nosurat])" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div x-data="{userType : ''}">
                    <div class="form-group row">
                        <label for="nosurat" class="col-md-2 col-form-label">@lang('No Surat')</label>

                        <div class="col-md-10">
                            <input type="text" name="nosurat" disabled class="form-control" placeholder="" value="{{$diskon->nosurat}}" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kdproduk" class="col-md-2 col-form-label">@lang('Produk')</label>

                        <div class="col-md-10">
                        <select name="kdproduk" class="form-control">
                            @foreach($produks as $produk)
                            <option value="{{$produk->kdproduk}}" >{{$produk->nmproduk}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="diskon" class="col-md-2 col-form-label">@lang('Diskon(%)')</label>

                        <div class="col-md-10">
                            <input type="text" name="diskon" class="form-control" placeholder="" value="" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="min" class="col-md-2 col-form-label">@lang('Minimal')</label>

                        <div class="col-md-10">
                            <input type="text" name="min" class="form-control" placeholder="" value="" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="max" class="col-md-2 col-form-label">@lang('Maximal')</label>

                        <div class="col-md-10">
                            <input type="text" name="max" class="form-control" placeholder="" value="" required />
                        </div>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm  ml-2 btn-primary float-right" type="submit">@lang('Tambah Produk')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection