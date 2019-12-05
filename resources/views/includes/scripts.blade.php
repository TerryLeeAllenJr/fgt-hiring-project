@if(isset($scripts) && is_array($scripts))
        @foreach($scripts as $script)
                <script src="{{ asset($script) }}" defer></script>
        @endforeach
@endif
