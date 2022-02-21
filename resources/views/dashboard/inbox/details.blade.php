@php($title='تفاصيل الرسالة')
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
                <a href="{{route('inboxes')}}"
                   class="text-muted">الرسائل</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('admin')}}"
                   class="text-muted">الصفحة الرئيسية</a>
            </li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="row" style="justify-content: center;">
        <div class="col-xl-7">
            <!--begin::Card-->
            <div class="card card-custom gutter-b card-stretch">
                <!--begin::Body-->
                <div class="card-body pt-4">


                    @if($data->User)
                        <span class="text-dark-75 font-weight-bolder mr-2">بيانات المستخدم</span>
                        <div class="d-flex align-items-center mb-7">

                            <!--begin::Title-->
                            <div class="d-flex flex-column">
                                <a href="javascript:void(this);" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{$data->User->name}}</a>
                                <span class="text-muted font-weight-bold">{{$data->User->email}}</span>
                            </div>
                        </div>
                    @endif
                    <!--end::User-->
                    <!--begin::Desc-->
                    <br>
                    <br>
                    <br>
                    <div class="mb-7" style="direction: rtl;">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-dark-75 font-weight-bolder mr-2">البريد الإلكتروني :</span>
                            <a href="javascript:void(this);" class="text-muted text-hover-primary">{{$data->email}}</a>
                        </div>
                        <div class="d-flex justify-content-between align-items-cente my-1">
                            <span class="text-dark-75 font-weight-bolder mr-2">رقم الهاتف :</span>
                            <a href="javascript:void(this);" class="text-muted text-hover-primary">{{$data->phone}}</a>
                        </div>
                    </div>
                    <span class="text-dark-75 font-weight-bolder mr-2">محتوى الرسالة </span>
                    <p class="mb-7">

                    {{$data->message}}
                    <!--end::Desc-->
                    <!--begin::Info-->

                    <!--end::Info-->
{{--                    <a href="javascript:void(this);" class="btn btn-block btn-sm btn-light-warning font-weight-bolder text-uppercase py-4" data-toggle="modal" data-target="#kt_chat_modal">write message</a>--}}
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
    </div>
@endsection
