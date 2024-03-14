@extends('layout.company-sidenav-layout')
@section('content')
    @include('components.company-job.company-job-list')
    @include('components.company-job.company-job-delete')
    @include('components.company-job.company-job-create')
    @include('components.company-job.company-job-update')
@endsection
