@php($title='الرسائل')
@extends('adminLayouts.app')
@section('title')
   {{$title}}
@endsection
@section('header')

@endsection
@section('breadcrumb')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <h5 class="text-warning font-weight-bold my-1 mr-5">{{$title}}</h5>
        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{route('admin')}}"
                   class="text-muted">الصفحة الرئيسية</a>
            </li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="text-right">
        <div class="card-body">
            {!! $dataTable->table() !!}
        </div>
    </div>
    </div>
@endsection
@section('script')
    {!! $dataTable->scripts() !!}
@endsection
