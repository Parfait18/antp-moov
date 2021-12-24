@extends('layouts.template', ['title' => 'Formulaire ANTP'])


<!-- contact breadcrumb -->

<!-- contact block -->
<!-- contact1 -->

@section('content')

    <!-- contact breadcrumb -->
    <section class="w3l-about-breadcrumb text-center">
        <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
            <div class="container py-2">
                <h2 class="title">Reponse</h2>
                <ul class="breadcrumbs-custom-path mt-2">
                    <li><a href="/">Accueil</a></li>
                    <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Message </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- contact breadcrumb -->


    <section class="w3l-contact-1 py-5">
        <div class="contacts-9 py-lg-5 py-md-4">
            <div class="container">

                <div class="form-row col-12 col-md-12 col-lg-12 mb-2 text-center mb-5">

                    <div class="form-group col-md-12 col-12">
                        <i class="fa {{ $icon ?? '' }} {{ $colorText ?? '' }}" style="font-size:58px;"></i>
                    </div>

                    <div class="form-group col-md-12 col-12">
                        <h4 class="{{ $colorText ?? '' }} text-center"
                            style="font-size:58px;font-family: unset;font-weight: bold;">{{ $statut ?? '' }}</h4>
                    </div>

                    <div class="form-group col-md-12 col-12">
                        <h4 class="text-danger text-center" style="font-size:18px;font-family: unset;font-weight: bold;">
                            {{ $message ?? '' }}</h4>
                    </div>

                    <div class="form-group col-md-12 col-12">
                        <p class="text-center"></p>
                    </div>

                </div>

            </div>
        </div>
    </section>





@endsection
