<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Beneficiare;

use Spatie\SimpleExcel\SimpleExcelWriter;
use Rap2hpoutre\FastExcel\FastExcel;

use PDF;

class AdminController extends Controller {
    
    
    public function index()
    {
        return view('dashboard');
    }
    public function getdata(Request $request){
        
        $validator = Validator::make(
            $request->all(),
            [
                'datedebut' => ['required'],
                'datafin' => ['required'],  
            ]
        );
        
        $from = $request->datedebut;
        $to = $request->datefin;
        $beneficiares = Beneficiare::whereBetween('created_at', [$from, $to])->get();
        $data = [
            'beneficiares' => $beneficiares,
            'statistic' => $this->getStatistics($from,$to),
            'from' => $from,
            'to' => $to
        ];
        return view('dashboard')->with($data);     
    }
    
    public function getStatistics($from,$to){
        $data = [
                
                'nbr_okpaid' => count(Beneficiare::whereBetween('created_at', [$from, $to])
                                  ->where('status_paiement','OK POUR PAIEMENT')->get()),
                'pourcent_okpaid'=> '',
                
                'nbr_nopaid' => count(Beneficiare::whereBetween('created_at', [$from, $to])
                                 ->where('status_paiement','NON OK POUR PAIEMENT')->get()),
                'pourcent_nopaid'=> '',
                
                'nbr_joint' => count(Beneficiare::whereBetween('created_at', [$from, $to])
                                  ->where('call_status','JOINT')->get()),
                'pourcent_joint' => '',
                
                'nbr_notcalled' =>count(Beneficiare::whereBetween('created_at', [$from, $to])
                                  ->where('call_status',NULL)
                                  ->where('status_paiement',NULL)->get()),
                
                'pourcent_notcalled' =>'',
                
                'nbr_anarque' =>count(Beneficiare::whereBetween('created_at', [$from, $to])
                             ->where('call_status',"SOUPCON DE CAS D'ARNAQUE")->get()),  
                'pourcent_anarque' =>'',
                
                'nbr_raccroche' =>count(Beneficiare::whereBetween('created_at', [$from, $to])
                             ->where('call_status','RACCROCHE AU NEZ')->get()),
                'pourcent_raccroche' =>'',
                
                'nbr_notdecroche' =>count(Beneficiare::whereBetween('created_at', [$from, $to])
                             ->where('call_status','NE DECROCHE PAS')->get()),
                'pourcent_notdecroche' =>'',
                
                'nbr_notjoinable' =>count(Beneficiare::whereBetween('created_at', [$from, $to])
                             ->where('call_status','INJOIGNABLE')->get()),   
                'pourcent_notjoinable' =>'',
                
                'nbr_askrecall' =>count(Beneficiare::whereBetween('created_at', [$from, $to])
                             ->where('call_status','DEMANDE DE RAPPELER')->get()),  
                'pourcent_askrecall'=> '',
                
                'total_calls'=> '',                                                                                                  
        ];
        
        $total_paiement = $data['nbr_okpaid']+$data['nbr_nopaid'];
        
        $total_calls = $data['nbr_joint']+$data['nbr_notcalled']+$data[ 'nbr_anarque']+$data[ 'nbr_raccroche']+$data['nbr_notdecroche']+$data['nbr_notjoinable']+$data['nbr_askrecall'];
        
        
        if( $total_paiement ==0 ){
             $pourcent_okpaid = 0;
            $pourcent_nopaid = 0;
        
        }else{
            $pourcent_okpaid = $data['nbr_okpaid'] / $total_paiement*100;
            $pourcent_nopaid =  $data['nbr_nopaid'] / $total_paiement*100;
        }
       
        if($total_calls == 0){
            
            $pourcent_joint = 0;
            
            $pourcent_notcalled = 0;
            
            $pourcent_anarque = 0;
            
            $pourcent_askrecall = 0;
            
            $pourcent_notjoinable = 0;
            
            $pourcent_raccroche = 0;
            
            $pourcent_notdecroche = 0;
        }else{
            $pourcent_joint = $data['nbr_joint'] /$total_calls *100;
            
            $pourcent_notcalled = $data['nbr_notcalled'] /$total_calls *100;
            
            $pourcent_anarque = $data['nbr_anarque']/$total_calls*100;
            
            $pourcent_askrecall = $data['nbr_askrecall']/$total_calls*100;
            
            $pourcent_notjoinable = $data['nbr_notjoinable']/$total_calls*100;
            
            $pourcent_raccroche = $data['nbr_raccroche']/$total_calls*100;
            
            $pourcent_notdecroche = $data['nbr_notdecroche']/$total_calls*100;
        }
       
        
        $data['pourcent_notdecroche'] = $pourcent_notdecroche;
        
        $data['pourcent_raccroche'] = $pourcent_raccroche;
        
        $data['pourcent_notjoinable'] = $pourcent_notjoinable;
        
        $data['pourcent_askrecall'] = $pourcent_askrecall;
        
        $data['pourcent_anarque'] = $pourcent_anarque;
        
        $data['pourcent_notcalled'] =  $pourcent_notcalled;
        
        $data['pourcent_joint'] =  $pourcent_joint;
       
        $data['pourcent_okpaid'] =  $pourcent_okpaid;
        
        $data['pourcent_nopaid'] =  $pourcent_nopaid;
        
        $data['total_paiement'] = $total_paiement;
        
        $data['total_calls'] = $total_calls;
        
        return $data;
    }
    
    public function exportExcel(Request $request){
         
        $file_name = 'beneficiares.csv';                                            
                                            
        $beneficiares = Beneficiare::select("code_agent As CODE_AGENT","code_agent_irm As CODE_AGENT_IRM","code_agent_rappelle as CODE_AGENT_RAPPELLE","nom as NOMS","prenom As PRENOMS","commenter As COMMENTAIRE","ville As LOCALISATION","msisdn As NUMERO_MTN","msisdn_moov_transafered As NUMERO_MOOV", "call_status As STATUS_CALL","mc_status As STATUS_MM","contact_done As NUMERO_COMMUNIQUER","cantact_loc As AGENCE","date_rdv As QUAND","action_done As ActionEffectue","identifiant As Id")->whereBetween('created_at', [$request->datebegin, $request->dateend])->get();
        
        return (new FastExcel($beneficiares ))->download($file_name);
    
    }

    public function exportPdf(Request $request)
    {    
     
        $statistic = $this->getStatistics($request->datebegin, $request->dateend);
     
        $pdf = PDF::loadView('viewpdf', ['statistic' => $statistic])->setOptions(['defaultFont' => 'ubuntu']);

        $pdf->setPaper('A4', 'portrait');
  
        return $pdf->download('statistic.pdf');
 
    
    }
}
