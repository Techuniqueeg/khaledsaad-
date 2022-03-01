<span class="switch switch-outline switch-icon switch-Primary">
    <label>
     <input type="checkbox" name="active" onchange="update_active(this)" value="{{$id}}"
            @if($active =='1') checked="checked" @endif >
     <span></span>
    </label>
   </span>


    <script type="text/javascript">
        function update_active(el) {
            if (el.checked)
                var active = '1';
            else
                var active = '0';
            $.post('{{ route('projects.active') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                active: active
            }, function (data) {

                if (active == 1) {
                    toastr.success("المنتج مفعل");
                } else {
                    toastr.error("المنتج غير مفعل");
                }
            });
        }
    </script>


