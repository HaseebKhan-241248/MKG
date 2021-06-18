@extends('layouts.app')
@section('title', 'Groups')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>@lang( 'Groups' )
        <small>@lang( 'Manage Your Groups' )</small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
@if (session('password_status'))
<div class="alert alert-success" role="alert">
    {{ session('password_status') }}
</div>
@endif
@if (Session::has('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{!! Session('error') !!}</strong>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<section class="content">
    @component('components.widget', ['class' => 'box-primary', 'title' => __( 'All Your Groups' )])

    @slot('tool')
    <div class="box-tools">
        <button type="button" class="btn btn-block btn-primary btn-modal"
            data-href="{{action('General\GeneralController@create')}}" data-container=".group_modal">
            <i class="fa fa-plus"></i> @lang( 'messages.add' )</button>
    </div>
    @endslot
    <div class="table-responsive">
        <table class="table table-bordered table-striped " id="example">
            <thead>
                <tr>
                    <th>Sr#</th>
                    <th>Group Code</th>
                    <th>Group Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Group Books</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groups as $group)
                <tr>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $group->id }}</td>
                    <td>{{ $group->title }}</td>
                    <td>{{ $group->description }}</td>
                    <td>{{ $group->status }}</td>
                    <td>{{ $group->group_books }}</td>
                    <td>
                        <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('delete.group',[$group->id]) }}" onclick="return confirm('Do you really want to delete this?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @endcomponent

    <div class="modal fade group_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>

</section>
<!-- /.content -->

@endsection