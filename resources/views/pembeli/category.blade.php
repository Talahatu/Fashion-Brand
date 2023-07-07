@extends('layouts.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($categories as $item)
                <div class="col-sm-2">
                    <form action="{{ route('categoryByProduct') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary" value="{{ $item->id }}"
                            name="submit">{{ $item->name }}</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    {{-- janky AF --}}
    <script>
        $(".active").removeClass("active");
        console.log(
            $('a span:contains("Category")').parent().parent().addClass("active"))

        $("a").on("click", function() {
            $(".active").removeClass("active");
            $(this).parent().addClass("active");
        });
    </script>
@endsection
