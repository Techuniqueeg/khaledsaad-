@php($title='تعديل المشروع')
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
                <a href="{{route('projects')}}"
                   class="text-muted">المشاريع</a>
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

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{route('projects.update',$data->id)}}" enctype="multipart/form-data">
                @csrf
                @include('dashboard.project.form')
            </form>
        </div>
    </div>


@endsection
@section('script')
    <script !src="">
        var avatar1 = new KTImageInput('kt_image_1');
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('submit', 'form', function() {
                $('button').attr('disabled', 'disabled');
            });
        });
    </script>
    <script type="text/javascript">
        $('#kt_dropzone_car').dropzone({
            paramName: "dzfile", // The name that will be used to transfer the file
            // autoProcessQueue: false,
            maxFilesize: 10, // MB
            clickable: true,
            addRemoveLinks: true,
            acceptedFiles: 'image/*',
            dictFallbackMessage: " المتصفح الخاص بكم لا يدعم خاصيه تعدد الصوره والسحب والافلات ",
            dictInvalidFileType: "لايمكنك رفع هذا النوع من الملفات ",
            dictCancelUpload: "الغاء الرفع ",
            dictCancelUploadConfirmation: " هل انت متاكد من الغاء رفع الملفات ؟ ",
            dictRemoveFile: "حذف الصوره",
            dictMaxFilesExceeded: "لايمكنك رفع عدد اكثر من هضا ",
            headers: {
                'X-CSRF-TOKEN':
                    "{{ csrf_token() }}"
            }
            ,
            url: "{{ route('projects.upload.images') }}", // Set the url
            success:
                function (file, response) {
                    $('form').append('<input type="hidden" name="images[]" value="' + response.name + '">')
                },

        });
    </script>

@endsection

