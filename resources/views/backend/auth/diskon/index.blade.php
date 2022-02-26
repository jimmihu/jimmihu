@extends('backend.layouts.app')

@section('title', __('Diskon'))

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
            @lang('Diskon')
        </x-slot>
        <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.diskon.create')"
                    :text="__('Tambah Diskon')"
                />
            </x-slot>

        <x-slot name="body">
            <h3>All ({{count($diskons)}})</h3>
            <table id="table1" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>@lang('No Surat')</th>
                    <th>@lang('Outlet')</th>
                    <th>@lang('Awal')</th>
                    <th>@lang('Akhir')</th>
                    <th>@lang('biodata.Action')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($diskons as $diskon)
                <tr>
                    <td>{{$diskon->nosurat}}</td>
                    @foreach($outlets as $outlet)
                    @if($outlet->kdoutlet==$diskon->kdoutlet)
                    <td>{{$diskon->kdoutlet}} ({{$outlet->nmoutlet}})</td>
                    @endif
                    @endforeach
                    <td>{{$diskon->awal}}</td>
                    <td>{{$diskon->akhir}}</td>
                    <td>
                        <x-forms.delete :action="route('admin.diskon.destroy',$diskon->nosurat)">
                        <a class="btn btn-sm btn-info" href="{{route('admin.diskon.edit',[$diskon->nosurat])}}">
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