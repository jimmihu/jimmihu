@extends('backend.layouts.app')

@section('title', __('biodata.All Employee'))

@section('breadcrumb-links')
@endsection

<link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('All Employee')
        </x-slot>


        <x-slot name="body">
            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>@lang('biodata.Employee Name')</th>
                    <th>@lang('biodata.Employee Phone')</th>
                    <th>@lang('biodata.Employee Email')</th>
                    <th>@lang('biodata.Employee Company')</th>
                    <th>@lang('biodata.Joined at')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($employees as $employee)
                <tr>
                    <td>{{$employee->e_first_name}} {{$employee->e_last_name}}</td>
                    <td>{{$employee->e_phone}}</td>
                    <td>{{$employee->e_email}}</td>
                    @foreach($companies as $company)
                    @if($company->c_id==$employee->c_id)
                    <td><img src="{{url('/logo/'.$company->c_logo.'.jpg')}}" class="user-profile-image" width="20" height="20">  {{$company->c_name}}</td>
                    @endif
                    @endforeach
                    <td>{{$employee->created_at}}</td>
                </tr>
                @endforeach  </tbody>
            </table>
        </x-slot>
    </x-backend.card>
@endsection
