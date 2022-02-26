@extends('backend.layouts.app')

@section('title', __('Produk'))

@section('breadcrumb-links')
@endsection

<link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table1').DataTable();
    } );
</script>

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Produk')
        </x-slot>
        <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.produk.create')"
                    :text="__('Tambah Produk')"
                />
            </x-slot>

        <x-slot name="body">
            <h3>All ({{count($produks)}})</h3>
            <table id="table1" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>@lang('Kode Produk')</th>
                    <th>@lang('Nama Produk')</th>
                    <th>@lang('Harga Net Atas')</th>
                    <th>@lang('biodata.Action')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($produks as $produk)
                <tr>
                    <td>{{$produk->kdproduk}}</td>
                    <td>{{$produk->nmproduk}}</td>
                    <td>{{$produk->hna}}</td>
                    <td>
                        <x-forms.delete :action="route('admin.produk.destroy',$produk->kdproduk)">
                        <a class="btn btn-sm btn-info" href="{{route('admin.produk.edit',[$produk->kdproduk])}}">
                            <i class="fa fa-pen"></i>
                        </a>
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                        </x-forms.delete>
                    </td>
                </tr>
                @endforeach  </tbody>
            </table>
        </x-slot>
    </x-backend.card>
@endsection