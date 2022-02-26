@extends('backend.layouts.app')

@section('title', __('Order'))

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
            @lang('Order')
        </x-slot>
        <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.order.create')"
                    :text="__('Tambah Order')"
                />
            </x-slot>

        <x-slot name="body">
            <h3>All ({{count($orders)}})</h3>
            <table id="table1" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>@lang('No Order')</th>
                    <th>@lang('Tanggal')</th>
                    <th>@lang('Outlet')</th>
                    <th>@lang('Lunas')</th>
                    <th>@lang('Total Bayar')</th>
                    <th>@lang('biodata.Action')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->noorder}}</td>
                    <td>{{$diskon->tanggal}}</td>
                    @foreach($outlets as $outlet)
                    @if($outlet->kdoutlet==$order->kdoutlet)
                    <td>{{$order->kdoutlet}} ({{$outlet->nmoutlet}})</td>
                    @endif
                    @endforeach
                    <td>{{$diskon->lunas}}</td>
                    <td>{{$diskon->totalbayar}}</td>
                    <td>
                        <x-forms.delete :action="route('admin.order.destroy',$order->noorder)">
                        <a class="btn btn-sm btn-info" href="{{route('admin.order.edit',[$order->order])}}">
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