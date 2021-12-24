@extends('layouts.template', ['title' => 'Acccueil ANTP'])


@section('content')
    <!-- banner section -->
    <section id="home" class="w3l-banner py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12 mt-lg-0 mt-4">

                    <h1 class="mb-4 title"> antp</span>
                    </h1>
                    <p>Vous êtes sur la page d'accueil du site de recensement des bénéficiaires du programme de financement de l’Agence
                        Nationale de Promotion des Patrimoines et du Développement du Tourisme (ANPT).</p>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-10 mt-lg-0 mt-4">
                    <div class="img-effect text-lg-center">
                        <img src={{ asset('assets/images/photo.png') }} alt="myphoto" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //banner section -->



    <!-- freelance hire me -->
    <section class="w3l-grid-quote  py-5">
        <div class="container py-3">
            <h3 class=" mb-md-5 mb-4">Pour vous enregistrer, accédez au formulaire en cliquant sur le lien que vous avez reçu par SMS sur votre mobile</h3>

             <p class="h5 title text-primary">Pour toute assistance, vous pouvez : </p>

                 <ul>
                     <li>
                        - Appeler le service client du Lundi au Samedi de 08 heures à 20 heures au 95992930
                     </li>

                     <li>
                        - Ecrivez-nous par whatsapp en appuyant ici : <a class="text-underline" href="hghf" style="text-decoration:underline;"> Contact Client </a>
                     </li>


                 </ul>


            {{-- <div class="d-grid contact-view">
                <div class="map-content-9">
                    <form action="https://sendmail.w3layouts.com/submitForm" method="post">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-sm-8 col-12 mt-lg-0 mt-4">
                                <input type="number" class="form-control" name="w3lName" id="w3lName" placeholder="Numéro"
                                    required="">
                            </div>

                            <div class="col-lg-4 col-sm-4 col-12 mt-lg-0 mt-4">
                                <button href="contact.html" class="btn btn-style btn-primary mr-2">Commencer </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}
        </div>

    </section>
    <!-- //freelance hire me -->
@endsection
