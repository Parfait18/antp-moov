@extends('layouts.app')

@section('content')

<link rel="stylesheet" href={{ asset('assets/css/style-starter.css')}}>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
         <h1 id="dashboard-title">DASHBOARD DES APPELS ANPT</h1>
        </div>
        <!-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div> -->
    </div>
    <div>
        <form class="row justify-content-center" action="{{ route('getdata') }}" method="get">
            <div class="col-md-4">
                <div class="form-group"> <!-- Date input -->
                    <label class="control-label" for="datedebut">Date de debut</label>
                    <input class="form-control" id="date" name="datedebut" placeholder="MM/DD/YYY" type="date" required/>
                    <span class="text-danger error-text datedebut_err small mb-2"></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group"> <!-- Date input -->
                    <label class="control-label" for="datefin">Date de Fin</label>
                    <input class="form-control" id="date" name="datefin" placeholder="MM/DD/YYY" type="date" required/>
                    <span class="text-danger error-text  datefin_err small mb-2"></span>
                </div>
            </div> 
            <div class="col-md-4">
                <div class="form-group"> <!-- Submit button -->
                    <button class="btn btn-primary" style="margin-top:30px;" name="submit" type="submit">Submit</button>
                </div>
            </div>
        </form>
        
    </div>
    <div class="row justify-content-center" style="margin-top:30px">
        <div class="col-md-12">
         <h1 id="dashboard-title">LISTE DES BENEFIAIRS
        @isset($from)
        @isset($to)
            DU  
         {{$from}} AU {{ $to }}
        @endisset
        @endisset
        </h1>
        </div>
        <div class="col-md-12">
            <table id="maintable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>CODE AGENT</th>
                        <th>CODE AGENT IRM</th>
                        <th>CODE AGENT RAPPELLE</th>
                        <th>NOM</th>
                        <th>PRENOM</th>
                        <th>VILLE</th>
                        <th>MSIDN</th>
                        <th>CALL STATUS</th>
                        <th>STATUS PAIEMENT</th>
                    </tr>
                </thead>
                <tbody>
                @isset($beneficiares) 
                @foreach ($beneficiares as $beneficiare)
                    <tr>
                        <td> {{ $beneficiare->code_agent }}</td>
                        <td> {{ $beneficiare->code_agent_irm }}</td>
                        <td> {{ $beneficiare->code_agent_rappelle }}</td>
                        <td> {{ $beneficiare->nom }}</td>
                        <td> {{ $beneficiare->prenom }}</td>
                        <td> {{ $beneficiare->ville }}</td>
                        <td> {{ $beneficiare->msisdn }}</td>
                        <td> {{ $beneficiare->call_status }}</td>
                        <td> {{ $beneficiare->status_paiement }}</td>
                    </tr>
                @endforeach
                @endisset
                 </tbody>
                 <tfoot>
                     <tr>
                        <th>CODE AGENT</th>
                        <th>CODE AGENT IRM</th>
                        <th>CODE AGENT RAPPELLE</th>
                        <th>NOM</th>
                        <th>PRENOM</th>
                        <th>VILLE</th>
                        <th>MSIDN</th>
                        <th>CALL STATUS</th>
                        <th>STATUS PAIEMENT</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
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
    @isset($beneficiares)
    <div class="row justify-content-center">
        <div class="col-md-12">
        <form class="row justify-content-center" action="{{ route('exportexcel')}}" method="get">
            
            <div class="col-md-4" style="display:none">
                <div class="form-group"> <!-- Date input -->
                    <input class="form-control" id="date" name="datebegin" placeholder="MM/DD/YYY" type="date"  value="{{ $from}}" required/>
                    <input class="form-control" id="date" name="dateend" placeholder="MM/DD/YYY" type="date" value="{{ $to}}" rerquired/>
                </div>
            </div> 
            <div class="col-md-4">
                <div class="form-group"> <!-- Submit button -->
                    <button class="btn btn-primary" style="margin-top:30px;" name="submit" type="submit">EXPORTER EXCEL</button>
                </div>
            </div>
            
        </form>
        <form class="row justify-content-center" action="{{ route('exportpdf')}}" method="get">
            
            <div class="col-md-4" style="display:none">
                <div class="form-group"> <!-- Date input -->
                    <input class="form-control" id="date" name="datebegin" placeholder="MM/DD/YYY" type="date"  value="{{ $from}}" required/>
                    <input class="form-control" id="date" name="dateend" placeholder="MM/DD/YYY" type="date" value="{{ $to}}" rerquired/>
                </div>
            </div> 
            <div class="col-md-4">
                <div class="form-group"> <!-- Submit button -->
                    <button class="btn btn-primary" style="margin-top:30px;" name="submit" type="submit">EXPORTER STATISTIC PDF</button>
                </div>
            </div>
            
        </form>
        </div>
    </div>
    @endisset
@endsection
