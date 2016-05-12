<!-- IntactFx Globals -->
<script>
    window.Intactfx = {
        csrfToken: '{{ csrf_token() }}',
        // Current User ID
        userId:   '{!! Auth::user() ? Auth::id() : 'null' !!}',
        // Current User Name
        userName: '{!! Auth::user() ? Auth::user()->name : 'null' !!}',
    }

</script>