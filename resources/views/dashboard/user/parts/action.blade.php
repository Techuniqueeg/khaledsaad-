{{--<a href="{{route('users.show',$id)}}" class="btn btn-icon btn-light-warning btn-circle mr-2">--}}
{{--    <i class="flaticon-eye"></i>--}}
{{--</a>--}}

@if($email_verified == '0')
    <span class="text-danger" > غير مفعل  </span>
@else
<a href="{{route('users.edit',$id)}}" title="تعديل" class="btn btn-icon btn-light-primary btn-circle mr-2">
    <i class="flaticon-edit"></i>
</a>
@endif
<a href="{{route('users.delete',$id)}}" title="حذف" onclick=" return confirm('هل متاكد من الحذف ؟ ')"
   class="btn btn-icon btn-light-danger btn-circle mr-2">
    <i class="flaticon2-rubbish-bin-delete-button"></i>
</a>

