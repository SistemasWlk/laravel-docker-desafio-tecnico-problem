<?php

namespace App\Http\Controllers\DesafioTecnico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Client;
use App\ClientType;
use App\Utils\Util;

class ClientController extends Controller
{

    private $sMsgErro = "";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current  = 'client';
        $oClientsType = Client::select('clients.*', 'client_types.*')
            ->join('client_types', 'client_types.id',  '=', 'clients.id_client_type')
            ->get();
        $oUtil = new Util;

        $oClientsTypeList = array();
        foreach ($oClientsType as $key => $oClientType) {
            $oClientTypeList                    = new \stdClass;
            $oClientTypeList->id                = $oClientType->id;
            $oClientTypeList->name              = $oClientType->name;
            $oClientTypeList->cpf               = $oUtil->cpfMascara($oClientType->cpf);
            $oClientTypeList->birth_date        = $oClientType->birth_date;
            $oClientTypeList->id_client_type    = $oClientType->id_client_type;
            $oClientTypeList->description       = $oClientType->description;
            $oClientsTypeList[] = $oClientTypeList;
        }

        $sMsgErro = $this->sMsgErro;

        return view('site.client.client', compact('oClientsTypeList', 'current', 'sMsgErro' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $oClientType   = ClientType::all();
        $sMsgErro       = $this->sMsgErro;
        $current        = 'client';

        return view('site.client.newclient', compact('current', 'oClientType', 'sMsgErro' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sMsgErro        = "";
        $current         = 'client';
        $name            = $request->input('name');
        $cpf             = str_replace(['.', '-'], '', $request->input('cpf'));
        $birth_date      = $request->input('birth_date');
        $id_client_type  = $request->input('id_client_type');

        $oValidaCpfCorre = Client::where('cpf', '=', $cpf)->get();
        $oClientType     = ClientType::where('id', '=', $id_client_type)->get();
        $oUtil           = new Util;

        if (count($oValidaCpfCorre) > 0) {
            $this->sMsgErro = "CPF já cadastrado!";
            return $this->create();
        }elseif (strlen($cpf) != 11 || !$oUtil->validate($cpf)) {
            $this->sMsgErro = "CPF invalido!";
            return $this->create();
        }elseif (count($oClientType) == 0) {
            $this->sMsgErro = "Tipo Cliente invalido!";
            return $this->create();
        }else{
            Client::insert([
                [
                    'name' => $name, 
                    'cpf' => $cpf,
                    'birth_date' => $birth_date,
                    'id_client_type' => $id_client_type
                ],
            ]);
            return $this->index();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
