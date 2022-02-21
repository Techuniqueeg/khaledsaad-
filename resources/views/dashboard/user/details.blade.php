@php($title='التفاصيل')
@extends('adminLayouts.app')
@section('title')
    {{$title}}
@endsection
@section('header')

@endsection
@section('breadcrumb')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Breadcrumb-->
        <h5 class="text-warning font-weight-bold my-1 mr-5">{{$title}}</h5>
        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{route('users')}}"
                   class="text-muted">المستخدمين</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('admin')}}"
                   class="text-muted">الصفحة الرئيسية</a>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection
@section('content')
    <div class="row" style="justify-content: center;">
        <div class="col-xl-3">
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <h3 style="text-align: center;">الصورة الشخصيه</h3>
                    <!--begin::Example-->
                    <div class="carousel-item active" style="text-align: center;">
                        <div class="col-12">
                            <img class="img-thumbnail" style="height: 150px; width: 150px;"
                                 src="{{$data->image}}">

                        </div>
                    </div>
                    <!--end::Example-->
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">الاسم</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Example-->
                    <div class="example">
                        <div class="example-preview">
                            {!! $data->name !!}
                        </div>
                    </div>
                    <!--end::Example-->
                </div>
            </div>
            <!--end::Card-->
        </div>

        <div class="col-xl-3">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">رقم الهاتف</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Example-->
                    <div class="example">
                        <div class="example-preview">
                            {!! $data->phone !!}
                        </div>
                    </div>
                    <!--end::Example-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <div class="col-xl-3">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">العنوان</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Example-->
                    <div class="example">
                        <div class="example-preview">
                            {!! $data->address !!}
                        </div>
                    </div>
                    <!--end::Example-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <div class="col-xl-3">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">البريد الاليكتروني</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Example-->
                    <div class="example">
                        <div class="example-preview">
                            {!! $data->email !!}
                        </div>
                    </div>
                    <!--end::Example-->
                </div>
            </div>
            <!--end::Card-->
        </div>
    </div>






@endsection
@section('script')
@endsection
