<?php

namespace App\Http\Controllers;

use App\Models\Beneficiare;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\Commune;
use Illuminate\Support\Facades\Redirect;

class BeneficiareController extends Controller
{
    public function send_msisdn(Request $req)
    {
        $validator_telephone = Validator::make(
            ['msisdn' => $req->msisdn],
            [
                'msisdn' => ['required', 'numeric', 'digits:8', Rule::in(Contact::all()->pluck('msisdn')->toArray())],
            ],
            [
                '*.required' => 'Le :attribute est obligatoire.',
                '*.digits' => 'Le numéro doit être composé de 8 chiffres..',
                'msisdn.numeric' => 'Le numéro de téléphone est numerique',
                'msisdn.in' => 'Veuillez renseigner un numéro correct',
            ]
        );



        if ($validator_telephone->fails()) {
            return redirect()->back()->withErrors($validator_telephone);
        }


        // $agent = Contact::where('msisdn', $req->msisdn)->first();

        // if ($agent) {

        $beneficiaire = Beneficiare::where('msisdn', $req->msisdn)->first();
        if ($beneficiaire) {
            return view('frontend.forms.returnurl')->with(['icon' => 'fa-check-circle', 'colorText' => 'text-success', 'statut' => 'Prise en compte']);
        }
        return   Redirect::to('/forms/'.$req->msisdn);

        // } else {

        //     return view('frontend.forms.antpmsisdn')->with(['icon' => 'fa-times-circle', 'colorText' => 'text-danger', 'statut' => 'Error', 'message' => 'Veuillez renseigner un numéro correct']);
        // }
    }




    public function verif_numero($code)
    {
        $agent = Contact::where('msisdn', $code)->first();

        if ($agent) {
            $beneficiaire = Beneficiare::where('msisdn', $code)->first();
            if ($beneficiaire) {
                return view('frontend.forms.returnurl')->with(['icon' => 'fa-check-circle', 'colorText' => 'text-success', 'statut' => 'Prise en compte']);
            }
            $communes = Commune::orderBy('nom_commune', 'asc')->get();
            return view('frontend.forms.antpforms')->with(['code' => Crypt::encrypt($code),'communes' => $communes,]);
        } else {
            // return view('frontend.forms.returnurl')->with(['icon' => 'fa-times-circle', 'colorText' => 'text-danger', 'statut' => 'Error', 'message' => 'Veuillez cliquer sur le bon lien. Merci!']);
            return view('frontend.forms.antpmsisdn');
        }
    }

    public function customRegistration(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => ['required', 'string', 'min:2'],
                'firstname' => ['required', 'string', 'min:2'],
                'dob' => ['required', 'date_format:Y-m-d'],
                'ville' => ['required', 'string'],
                'agence_proche' => ['required', 'string'],
            ],
            [
                '*.required' => 'Le :attribute est obligatoire.',
                '*.min' => 'Le :attribute doit avoir au moins :min caractères.',
                '*.max' => 'Le :attribute doit avoir au plus :max caractères.',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
                'message' => "Veuillez vérifier les informations renseignées",
            ]);
        }

        $validator_telephone = Validator::make(
            ['msisdn' => $request->msisdn],
            [
                'msisdn' => ['required', 'numeric', 'digits:8', Rule::unique(Beneficiare::class)],
            ],
            [
                '*.digits' => 'Le numéro moov doit être composé de 8 chiffres..',
                'msisdn.unique' => 'Le numéro de téléphone à été prise en compte',
            ]
        );

        if ($validator_telephone->fails()) {
            return response()->json([
                'error' => $validator_telephone->errors(),
                'message' => "Veuillez vérifier les informations mentionnée",
            ]);
        }

        $prefix = Str::substr($request->msisdn, 0, 2);
        $prefix_validator = Validator::make(
            ['msisdn' => $prefix],
            [
                'msisdn' => ['required', Rule::in(['95','94','64','65','63','60','98','68','99','55'])],
            ],
            [
                'msisdn.in' => 'Le numéro de téléphone doit être un numéro moov',
            ]
        );
        if ($prefix_validator->fails()) {
            return response()->json([
                'error' => $prefix_validator->errors(),
                'message' => "Veuillez vérifier les informations mentionnée",
            ]);
        }

        try {
            $decrypted = Crypt::decrypt($request->codeed);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Une erreure s'est produite veuillez actualiser la page",
            ]);
        }

        $user = Beneficiare::create([
            'nom' => Str::upper($request->name),
            'prenom' => Str::headline($request->firstname),
            'msisdn' => $decrypted,
            'dob' => $request->dob,
            'ville' => $request->ville,
            'agence' => $request->agence_proche,
            'msisdn_moov_transafered' => $request->msisdn ,
        ]);

        if ($user) {
            return response()->json([
                'status' => true,
                'code_user' => $user->msisdn,
            ]);
        }
    }
}
