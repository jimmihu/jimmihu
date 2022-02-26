@extends('backend.layouts.app')

@section('title', __('Outlet'))

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
            @lang('Outlet')
        </x-slot>
        <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.outlet.create')"
                    :text="__('Tambah Outlet')"
                />
            </x-slot>

        <x-slot name="body">
            <h3>All ({{count($outlets)}})</h3>
            <table id="table1" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>@lang('Kode Outlet')</th>
                    <th>@lang('Nama Outlet')</th>
                    <th>@lang('Alamat')</th>
                    <th>@lang('Aktif')</th>
                    <th>@lang('biodata.Action')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($outlets as $outlet)
                <tr>
                    <td>{{$outlet->kdoutlet}}</td>
                    <td>{{$outlet->nmoutlet}}</td>
                    <td>{{$outlet->alamat}}</td>
                    @if($outlet->aktif=='0')
                    <td>Aktif</td>
                    @else
                    <td>Non-Aktif</td>
                    @endif
                    <td>
                        <x-forms.delete :action="route('admin.outlet.destroy',$outlet->kdoutlet)">
                        <a class="btn btn-sm btn-info" href="{{route('admin.outlet.edit',[$outlet->kdoutlet])}}">
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