@extends('layouts.app')


@section('blade_scripts')
    <script>
        $(document).ready(function() {
            let parent_h = $(".content-wrapper").height();
            parent_h = parent_h;
            $("#myiframe").height(parent_h);

            // alert($(".content-wrapper").height());

        });
    </script>
@endsection

@section('content')
    </div>
    {{-- content-wrapper --}}
@endsection
