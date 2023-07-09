@extends('layouts.index')

@section('content')
    @if (Session::has('status'))
        <p id="statusAlert" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
    @endif

    <div class="container panel-group">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h1>{{ $user->name }}</h1>
            </div>
            <div class="panel-body">
                <div class="saldo">
                    <h3 id="saldo">Saldo: {{ $user->saldo }}</h3>
                    <a href="#modalTopup" data-toggle="modal" onclick="removeAlert()" class="btn btn-info">Top-Up</a>
                </div>
                <br>
                <ul class="list-group">
                    <li class="list-group-item">Email: {{ $user->email }}</li>
                    <li class="list-group-item">Poin: {{ $user->poin }}</li>

                </ul>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTopup" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Top-Up</h4>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <span class="input-group-addon">Nominal</span>
                        <input id="topup" type="number" class="form-control" name="topup"
                            placeholder="Insert nominal..." min="1000" step="1000">

                    </div>
                    <small class="form-text text-muted">Please type in your desired top-up nominal!</small>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="updateTopup({{ $user->id }})"
                        class="btn btn-primary">Submit</button>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(".active").removeClass("active");
        console.log(
            $('a span:contains("Profile")').parent().parent().addClass("active"))

        $("a").on("click", function() {
            $(".active").removeClass("active");
            $(this).parent().addClass("active");
        });
        const statusAlert = $('#statusAlert');

        function removeAlert() {
            $("#topup").val('')
            $("#smallAlert").hide();
        }

        function updateTopup(id) {
            if ($("#topup").val() <= 1000) {
                $("#smallAlert").hide();
                $('<div class="alert alert-danger" id="smallAlert"><strong>Danger!</strong> Nominal can\' be negative or smaller than 1000!</div>')
                    .insertAfter("small");
                return
            }
            $.ajax({
                type: "POST",
                url: "{{ route('updateS') }}",
                data: {
                    "_token": '{{ csrf_token() }}',
                    "id": id,
                    "nominal": $("#topup").val()
                },
                success: function(response) {
                    if (response["status"] == "ok") {
                        $(".close").click();
                        $("#saldo").text("Saldo: " + response["saldo"]);
                    } else {
                        console.log("Failed!");
                    }
                }
            });
        }


        // Wait for 5 seconds and then fade out the element
        setTimeout(function() {
            statusAlert.fadeOut();
        }, 4000);
    </script>
@endsection
