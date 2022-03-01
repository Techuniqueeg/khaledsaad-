<span class="switch switch-outline switch-icon switch-Primary">
    <label>
     <input type="checkbox" name="special" onchange="update_special(this)" value="{{$id}}"
            @if($special =='1') checked="checked" @endif >
     <span></span>
    </label>
   </span>


    <script type="text/javascript">
        function update_special(el) {
            if (el.checked)
                var special = '1';
            else
                var special = '0';
            $.post('{{ route('projects.special') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                special: special
            }, function (data) {
                if (special == 1) {
                    toastr.success("المنتج خالص");
                } else {
                    toastr.error("المنتج طبيعي");
                }
            });
        }
    </script>


