<a href="{{route('inboxes.show',$id)}}"
    @if($seen == '1')
        class="btn btn-icon btn-primary btn-circle mr-2"
    @else
        class="btn btn-icon btn-danger btn-circle mr-2"
    @endif
>
    <i class="fa fa-eye"></i>
</a>

