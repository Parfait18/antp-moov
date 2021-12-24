@extends('layouts.template', ['title' => 'Formulaire ANTP'])


<!-- contact breadcrumb -->

<!-- contact block -->
<!-- contact1 -->

@section('content')

    <!-- contact breadcrumb -->
    <section class="w3l-about-breadcrumb text-center">
        <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
            <div class="container py-2">
                <h2 class="title">Entrez votre numero</h2>
                <ul class="breadcrumbs-custom-path mt-2">
                    <li><a href="/">Accueil</a></li>
                    <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Numéro </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- contact breadcrumb -->


    <section class="w3l-contact-1 py-3">
        <div class="contacts-9 py-lg-5 py-md-4">
            <div class="container">
                <h6 class="mb-md-2 mb-1 mt-2">Veuillez renseigner dans le champs ci-dessous, le numéro sur lequel vous avez reçu le message.</h6>
                <p style="font-size:14px;" class="{{ $colorText ?? '' }}"> <i class="fa {{ $icon ?? '' }} {{ $colorText ?? '' }}" style="font-size:8px;"></i> {{$message ?? ''}}</p>
                <div class="contact-view">
                    <div class="map-content-9">
                        <form action="{{ route('sendmsisdn') }}" method="post" id="formsantp">
                            @csrf
                            <div class="row">

                                <div class="col-lg-12 col-sm-12 col-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>


                                <div class="col-lg-6 col-sm-6 col-12 py-sm-2 py-2">
                                    <label style="font-weight: bold; font-size: 13px; margin-bottom: 5px;"><small>Votre
                                            numéro </small> <span class="text-danger">*</span> </label>
                                    <input type="number" class="form-control" name="msisdn" id="msisdn"
                                        placeholder="Numéro Moov" required="" autocomplete="off">
                                    <span class="text-danger error-text msisdn_err small mb-2"></span>
                                </div>





                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-sm-4 col-8 py-sm-2 py-2">
                                    <button type="submit"
                                        class="btn btn-primary btn-style mt-4 btn_submit">Continuer</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        function printErrorMsg(msg) {
            $.each(msg, function(key, value) {
                $('.' + key + '_err').text(value);
            });
        }

        function register() {
            var donnees = $("form#formsantp").serialize();
            $('span[class*="_err"]').text('');

            $.ajax({
                url: "{{ url('/registration') }}",
                type: "POST",
                dataType: "json",
                data: donnees,
                beforeSend: function(data) {
                    $('.btn_submit').html(
                        'Patientez... <i class="fa fa-spinner fa-pulse fa-1x fa-fw ml-2"></i>').prop(
                        "disabled", true);
                },
                success: function(data) {
                    $("#message_sub").removeClass("alert-danger").html("").hide();

                    if (!$.isEmptyObject(data.error)) {
                        printErrorMsg(data.error);
                    }
                    try {
                        if (data.status) {
                            $('.btn_submit').html(
                                'Success <i class="fa fa-check fa-pulse fa-1x fa-fw ml-2" aria-hidden="true"></i>'
                            ).prop("disabled", true);
                            window.location.href = "{{ url('/forms') }}/" + data.code_user;
                        } else {
                            $('.btn_submit').html('S\'inscrire').prop("disabled", false);
                            $("#message_sub").addClass("alert-danger").html(data.message).show();
                        }
                    } catch (error) {
                        $('.btn_submit').html('S\'inscrire').prop("disabled", false);
                        $("#message_sub").addClass("alert-danger").html(
                            'Une erreur s\'est produite, veuillez ressayer').show();
                    }
                },
                error: function(response) {
                    $("#message_sub").addClass("alert-danger").html(
                        'Une erreure s\'est produite veuillez actualiser la page').show();

                }
            });

        }
    </script>



@endsection
