    @foreach (session('flash_notification', collect())->toArray() as $message)
        <script src="{{asset('assets/js/jquery.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.js"></script>
        <script type="text/javascript">
            Materialize.toast("{!! $message['message'] !!}",5000);
        </script>
    @endforeach
    {{ session()->forget('flash_notification') }}
