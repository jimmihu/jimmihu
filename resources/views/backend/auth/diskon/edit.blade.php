
@extends('backend.layouts.app')

@section('title', __('Edit Diskon'))

<link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>


@section('content')
    <x-forms.patch :action="route('admin.diskon.update',[$diskon->nosurat])" name="form" id="form">
        <x-backend.card>
            <x-slot name="header">
                @lang('Edit Diskon')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.diskon.index')" :text="__('Cancel')" />
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
                            <input type="date" name="awal" class="form-control" placeholder="" value="{{$diskon->awal}}" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="akhir" class="col-md-2 col-form-label">@lang('Akhir')</label>

                        <div class="col-md-10">
                            <input type="date" name="akhir" class="form-control" placeholder="" value="{{$diskon->akhir}}" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="total" class="col-md-2 col-form-label">@lang('Total')</label>

                        <div class="col-md-10">
                            <input type="text" name="total" class="" placeholder="" value="{{$diskon->detail()->count()}}" disabled/>
                            <x-utils.link
                                icon="c-icon cil-plus"
                                class="card-header-action"
                                :href="route('admin.diskon.creates',[$diskon->nosurat])"
                                :text="__('Tambah Produk')"
                            />
                        </div>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm  ml-2 btn-primary float-right" type="submit">@lang('Edit')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>

    <x-backend.card>
        <x-slot name="header">
                @lang('Diskon Produk')
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.diskon.creates',[$diskon->nosurat])"
                    :text="__('Tambah Produk')"
                    />
            </x-slot>
        <x-slot name="body">
            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>@lang('No Surat')</th>
                    <th>@lang('Kode Produk')</th>
                    <th>@lang('Diskon(%)')</th>
                    <th>@lang('Minimal')</th>
                    <th>@lang('Maximal')</th>
                    <th>@lang('biodata.Action')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($details as $d)
                <tr>
                    <td>{{$d->nosurat}}</td>
                    @foreach($produks as $produk)
                    @if($produk->kdproduk==$d->kdproduk)
                    <td>{{$d->kdproduk}} ({{$produk->nmproduk}})</td>
                    @endif
                    @endforeach
                    <td>{{$d->diskon}}%</td>
                    <td>{{$d->min}}</td>
                    <td>{{$d->max}}</td>
                    <td>
                        <x-forms.delete :action="route('admin.diskon.deletes',[$d->nosurat,$d->kdproduk])">
                        <button class="btn btn-sm  ml-2 btn-danger float-right" type="submit"><i class="fa fa-trash"></i></button>
                        </x-forms.delete>
                    </td>
                </tr>
                @endforeach </tbody>
            </table>
        </x-slot>
    </x-backend.card>
@endsection