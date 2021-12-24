@extends('layouts.template', ['title' => 'Formulaire ANTP'])


<!-- contact breadcrumb -->

<!-- contact block -->
<!-- contact1 -->

@section('content')

    <!-- contact breadcrumb -->
    <section class="w3l-about-breadcrumb text-center">
        <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
            <div class="container py-2">
                <h2 class="title">Formulaire à remplir</h2>
                <ul class="breadcrumbs-custom-path mt-2">
                    <li><a href="/">Accueil</a></li>
                    <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Contact </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- contact breadcrumb -->


    <section class="w3l-contact-1 py-5">
        <div class="contacts-9 py-lg-5 py-md-4">
            <div class="container">
                <div class="contact-view">
                    <div class="map-content-9">
                        <form action="javascript:register();" method="post" id="formsantp">
                            @csrf
                            <input type="hidden" name="codeed" id="codeed" value="{{ $code }}">
                            <p class="h6">CONFIRMATION DE L’IDENTITE</p>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12 py-sm-2 py-2">
                                    <label style="font-weight: bold; font-size: 13px; margin-bottom: 5px;"><small>Nom </small> <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nom"
                                        required="">
                                    <span class="text-danger error-text name_err small mb-2"></span>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-12  py-sm-2 py-2">
                                    <label style="font-weight: bold; font-size: 13px; margin-bottom: 5px;"><small>Prénom(s) </small> <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" name="firstname" id="firstname"
                                        placeholder="Prénom(s)" required="">
                                    <span class="text-danger error-text firstname_err small mb-2"></span>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-12 py-sm-2 py-2">
                                    <label style="font-weight: bold; font-size: 13px; margin-bottom: 5px;"><small>Date de naissance </small> <span class="text-danger">*</span> </label>
                                    <input type="date" max='{{ date('Y-m-d') }}' class="form-control" name="dob"
                                        id="dob" placeholder="Date de Naissance" required="">
                                    <span class="text-danger error-text dob_err small mb-2"></span>
                                </div>
                            </div>


                            <p class="h6 mt-3">ADRESSE GEOGRAPHIQUE</p>

                            <div class="row">

                                {{-- <div class="col-lg-6 col-sm-6 col-12 py-sm-2 py-2">
                                    <select class="form-control" name="departement" id="departement" required="">
                                        <option>Choisir Departement</option>
                                        <option value="sdsdsdd">sdqfdfds</option>
                                        <option value="dsssdsds">ddssdsdsds</option>
                                    </select>
                                </div> --}}

                                <div class="col-lg-6 col-sm-6 col-12 py-sm-2 py-2">
                                    <label style="font-weight: bold; font-size: 13px; margin-bottom: 5px;"><small>Ville  </small> <span class="text-danger">*</span> </label>

                                    <select class="form-control" name="ville" id="ville" required="">
                                        <option value="">Choisir Ville</option>
                                        @foreach ($communes as $com)
                                            <option value="{{ $com->nom_commune }}">
                                                {{ $com->nom_commune }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-6 col-sm-6 col-12 py-sm-2 py-2">
                                    <label style="font-weight: bold; font-size: 13px; margin-bottom: 5px;"><small>Y a-t-il une agence moov proche de vous ? </small> <span class="text-danger">*</span> </label>
                                    <select class="form-control" name="agence_proche" id="agence_proche" required="">
<<<<<<< HEAD
                                        <option value="">Choisir</option>
=======
                                        <option>Choisir</option>
>>>>>>> master
                                        <option value="OUI">OUI</option>
                                        <option value="NON">NON</option>
                                    </select>
                                </div>
                            </div>

                            <p class="h6 mt-3">CONFIRMATION MOYEN DE PAIEMENT</p>

                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12 py-sm-2 py-2">
                                    <label style="font-weight: bold; font-size: 13px; margin-bottom: 5px;"><small>Numéro paiement </small> <span class="text-danger">*</span> </label>
                                    <input type="number" class="form-control" name="msisdn" id="msisdn"
                                        placeholder="Numéro Moov" required="">
                                    <span class="text-danger error-text msisdn_err small mb-2"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-12 py-sm-2 py-2">
                                    <div class="alert alert-danger" id="message_sub" style="display: none;"></div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-4 col-sm-4 col-8 py-sm-2 py-2">
                                    <button type="submit"
                                        class="btn btn-primary btn-style mt-4 btn_submit">Soumettre</button>
                                </div>
                            </div>
<<<<<<< HEAD





=======
>>>>>>> master
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
<<<<<<< HEAD
    </script>


=======
    </script
>>>>>>> master

@endsection
