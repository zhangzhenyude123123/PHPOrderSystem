@if (count($errors) > 0)
    <div class="alert alert-danger">
        <div class="mt-2"><b>There has some erro：</b></div>
        <ul class="mt-2 mb-2">
            @foreach ($errors->all() as $error)
                <li><i class="glyphicon glyphicon-remove"></i> {{ $error }}</li>
            @endforeach
{{--            <script>--}}
{{--            toastr.success('你好，世界！', '你好')--}}
{{--            </script>--}}
        </ul>
    </div>
@endif
