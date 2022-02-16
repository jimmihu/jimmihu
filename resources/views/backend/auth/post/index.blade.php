@extends('backend.layouts.app')

@section('title', __('Posts'))

@section('breadcrumb-links')
@endsection

<link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#publish').DataTable();
    } );
    $(document).ready(function() {
        $('#draft').DataTable();
    } );
    $(document).ready(function() {
        $('#thrash').DataTable();
    } );
    function publish() {
        var x = document.getElementById("publishDiv");
        var y = document.getElementById("publishA");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.color = "black";
        } else {
            x.style.display = "none";
            y.style.color = "blue";
        }
    }
    function draft() {
        var x = document.getElementById("draftDiv");
        var y = document.getElementById("draftA");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.color = "black";
        } else {
            x.style.display = "none";
            y.style.color = "blue";
        }
    }
    function thrash() {
        var x = document.getElementById("thrashDiv");
        var y = document.getElementById("thrashA");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.color = "black";
        } else {
            x.style.display = "none";
            y.style.color = "blue";
        }
    }
</script>

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Posts')
        </x-slot>
        <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.post.create')"
                    :text="__('Add New')"
                />
            </x-slot>

        <x-slot name="body">
            <a onclick="publish()" style="color:black;" id="publishA"><h3>Published ({{count($publishs)}})</h3></a>
            <div id="publishDiv">
            <table id="publish" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>@lang('Title')</th>
                    <th>@lang('Category')</th>
                    <th>@lang('biodata.Action')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($publishs as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->category}}</td>
                    <td>
                        <x-forms.delete :action="route('admin.post.destroy',$post->id)">
                        <a class="btn btn-sm btn-info" href="{{route('admin.post.edit',[$post->id])}}">
                            <i class="fa fa-pen"></i>
                        </a>
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                        </x-forms.delete>
                    </td>
                </tr>
                @endforeach  </tbody>
            </table>
            </div>

            <a onclick="draft()" style="color:blue;" id="draftA"><h3>Drafts ({{count($drafts)}})</h3></a>
            <div id="draftDiv" style="display:none">
            <table id="draft" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>@lang('Title')</th>
                    <th>@lang('Category')</th>
                    <th>@lang('biodata.Action')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($drafts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->category}}</td>
                    <td>
                        <x-forms.delete :action="route('admin.post.destroy',$post->id)">
                        <a class="btn btn-sm btn-info" href="{{route('admin.post.edit',[$post->id])}}">
                            <i class="fa fa-pen"></i>
                        </a>
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                        </x-forms.delete>
                    </td>
                </tr>
                @endforeach  </tbody>
            </table>
            </div>

            <a onclick="thrash()" style="color:blue;" id="thrashA"><h3>Thrashed ({{count($thrashs)}})</h3></a>
            <div id="thrashDiv" style="display:none">
            <table id="thrash" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>@lang('Title')</th>
                    <th>@lang('Category')</th>
                    <th>@lang('biodata.Action')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($thrashs as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->category}}</td>
                    <td>
                        <a class="btn btn-sm btn-info" href="{{route('admin.post.edit',[$post->id])}}">
                            <i class="fa fa-pen"></i>
                        </a>
                    </td>
                </tr>
                @endforeach  </tbody>
            </table>
            </div>
        </x-slot>
    </x-backend.card>
@endsection
