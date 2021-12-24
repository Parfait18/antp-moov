<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'antp') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" >
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js" ></script>
    <script type="text/javascript" src="{{ asset('assets/js/myscript.js')}}"></script>
</head>
<body>
    <div id="app">
        <main class="py-4">
            <div class="row justify-content-center" >
                <div class="col-md-12">
                    <h1 id="dashboard-title">STATISTICS</h1>
                </div>
                <div class="col-md-6">
                    <table class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>STATUT DES APPELS</th>
                                <th>NB</th>
                                <th>POURC%</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>DEMANDE DE RAPPELER</td>
                                <td>
                                @isset($statistic)
                                    {{  $statistic['nbr_askrecall']}}
                                @endisset</td>
                                <td>
                                @isset($statistic)
                                    {{  $statistic['pourcent_askrecall'] }} 
                                @endisset</td>
                            </tr>
                            <tr>
                                <td>INJOIGNABLE</td>
                                <td>
                                @isset($statistic)
                                    {{  $statistic['nbr_notjoinable'] }}
                                @endisset</td>
                                <td>
                                @isset($statistic)
                                    {{  $statistic ['pourcent_notjoinable'] }} 
                                @endisset</td>
                            </tr>
                            <tr>
                                <td>NE DECROCHE PAS</td>
                                <td>
                                @isset($statistic)
                                    {{  $statistic['nbr_notdecroche'] }}
                                @endisset</td>
                                <td>
                                @isset($statistic)
                                    {{  $statistic['pourcent_notdecroche'] }} 
                                @endisset</td>
                            </tr>
                            <tr>
                                <td>RACCROCHE AU NEZ</td>
                                <td>
                                @isset($statistic)
                                    {{  $statistic['nbr_raccroche'] }}
                                @endisset</td>
                                <td>
                                @isset($statistic)
                                    {{  $statistic['pourcent_raccroche'] }} 
                                @endisset</td>
                            </tr>
                            <tr>
                                <td>SOUPCON ANARQUE</td>
                                <td>
                                @isset($statistic)
                                    {{  $statistic['nbr_anarque'] }}
                                @endisset</td>
                                <td>
                                @isset($statistic)
                                    {{  $statistic['pourcent_anarque'] }} 
                                @endisset</td>
                            </tr>
                            <tr>
                                <td>JOIN</td>
                                <td>
                                @isset($statistic)
                                    {{  $statistic['nbr_joint'] }}
                                @endisset</td>
                                <td>
                                @isset($statistic)
                                    {{  $statistic['pourcent_joint'] }} 
                                @endisset</td>
                            </tr>
                            <tr>
                                <td>PAS ENCORE APPELE</td>
                                <td>
                                @isset($statistic)
                                    {{  $statistic['nbr_notcalled'] }}
                                @endisset</td>
                                <td>
                                @isset($statistic)
                                    {{  $statistic['pourcent_notcalled'] }} 
                                @endisset</td>
                            </tr>
                            <tr>
                                <td>TOTAL</td>
                                <td>
                                @isset($statistic)
                                    {{  $statistic['total_calls'] }}
                                @endisset</td>
                                <td>100%</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>STATUT DES APPELS</th>
                                <th>NB</th>
                                <th>POURC%</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>STATUT PAIEMENT</th>
                                <th>NB</th>
                                <th>Pourc%</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>NON OK POUR PAIEMENT</td>
                                <td>
                                @isset($statistic)
                                    {{  $statistic['nbr_nopaid'] }}
                                @endisset</td>
                                <td>
                                @isset($statistic)
                                    {{  $statistic['pourcent_nopaid'] }} 
                                @endisset</td>
                            </tr>
                            <tr>
                                <td>OK POUR PAIEMENT</td>
                                <td>  
                                @isset($statistic)
                                    {{  $statistic['nbr_okpaid'] }}
                                @endisset
                                </td>
                                <td>
                                @isset($statistic)
                                    {{  $statistic['pourcent_okpaid'] }} 
                                @endisset</td>
                            </tr>
                            <tr>
                                <td>TOTAL</td>
                                <td>
                                @isset($statistic)
                                    {{  $statistic['total_paiement'] }}
                                @endisset</td>
                                <td>100%</td>
                            </tr>
                        </tbody>
                        <tfoot>
                                <th>STATUT PAIEMENT</th>
                                <th>NB</th>
                                <th>Pourc%</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>  
        </main>
    </div>
</body>
</html>