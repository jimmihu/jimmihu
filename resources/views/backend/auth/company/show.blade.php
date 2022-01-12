@extends('backend.layouts.app')

@section('title', __('biodata.View Company'))

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
            @lang('biodata.View Company')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.company.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('biodata.Company Name')</th>
                    <td>{{$company->c_name}}</td>
                </tr>

                <tr>
                    <th>@lang('biodata.Company Email')</th>
                    <td>{{$company->c_email}}</td>
                </tr>

                <tr>
                    <th>@lang('biodata.Company Logo')</th>
                    <td><img src="{{url('/logo/'.$company->c_logo.'.jpg')}}" class="user-profile-image" width="100" height="100"></td>
                </tr>

                <tr>
                    <th>@lang('biodata.Company Website')</th>
                    <td>{{$company->c_website}}</td>
                </tr>

                <tr>
                    <th>@lang('biodata.Joined at')</th>
                    <td>{{$company->created_at}}</td>
                </tr>

                <tr>
                    <th>@lang('biodata.Total Employee')</th>
                    <td>{{$employees->count()}}<x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.employee.creates',[$company->c_id])"
                    :text="__('biodata.Add Employee')"
                /></td>
                </tr>
            </table>
        </x-slot>

        <x-slot name="footer">
        <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>@lang('biodata.Employee First Name')</th>
                    <th>@lang('biodata.Employee Last Name')</th>
                    <th>@lang('biodata.Employee Phone')</th>
                    <th>@lang('biodata.Employee Email')</th>
                    <th>@lang('biodata.Joined at')</th>
                    <th>@lang('biodata.Action')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($employees as $employee)
                <tr>
                    <td>{{$employee->e_first_name}}</td>
                    <td>{{$employee->e_last_name}}</td>
                    <td>{{$employee->e_phone}}</td>
                    <td>{{$employee->e_email}}</td>
                    <td>{{$employee->created_at}}</td>
                    <td>
                        <x-forms.delete :action="route('admin.employee.destroy',$employee->e_id)">
                        <a class="btn btn-sm btn-info" href="{{route('admin.employee.edit',[$employee->e_id])}}">
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
