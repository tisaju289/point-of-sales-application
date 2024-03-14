@extends('layout.admin-sidenav-layout')
@section('content')
    @include('components.page.page-list')
    @include('components.page.page-delete')
    @include('components.page.page-create')
    @include('components.page.page-update')
@endsection
