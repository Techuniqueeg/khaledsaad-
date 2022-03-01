<span class="switch switch-outline switch-icon switch-Primary">
    <label>
     <input type="checkbox" name="tryable" onchange="update_tryable(this)" value="{{$id}}"
            @if($tryable =='1') checked="checked" @endif >
     <span></span>
    </label>
   </span>


    <script type="text/javascript">
        function update_tryable(el) {
            if (el.checked)
                var tryable = '1';
            else
                var tryable = '0';
            $.post('{{ route('projects.tryable') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                tryable: tryable
            }, function (data) {
                if (tryable == 1) {
                    toastr.success("المنتج قابل للتجربه");
                } else {
                    toastr.error("المنتج غير قابل للتجربه");
                }
            });
        }
    </script>


