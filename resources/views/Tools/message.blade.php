@foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(session()->has($msg))
        <div class="flash-message">
            <p class="alert alert-{{ $msg }}">
                {{ session()->get($msg) }}
            </p>
            <script>
                toastr.success('Have fun storming the castle!', 'Miracle Max Says')
            </script>
        </div>
    @endif
@endforeach
