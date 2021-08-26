<?php

namespace App\Http\Controllers\DesafioTecnico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Loan;
use App\Book;
use App\Client;
use App\ClientType;
use App\Utils\Util;

class LoanController extends Controller
{

    private $sMsgErro = "";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current = 'loan';
        $oLoans  = Loan::select('loans.*', 'clients.*', 'books.*', 'client_types.*')
            ->join('clients', 'id_client',  '=', 'clients.id')
            ->join('books', 'id_book',  '=', 'books.id')
            ->join('client_types', 'client_types.id',  '=', 'clients.id_client_type')
            ->get();
        $oUtil = new Util;

        $oLoansList = array();
        foreach ($oLoans as $key => $oLoan) {

            $oLoansLists                    = new \stdClass;
            $dev_book                       = date('d/m/Y', strtotime("+5 $oLoan->devolution days", strtotime($oLoan->date_cad )));
            $date_now                       = date('d/m/Y');
            $oLoansLists->id                = $oLoan->id;
            $oLoansLists->id_client         = $oLoan->id_client;
            $oLoansLists->name              = $oLoan->name;
            $oLoansLists->cpf               = $oUtil->cpfMascara($oLoan->cpf);
            $oLoansLists->id_book           = $oLoan->id_book;
            $oLoansLists->title             = $oLoan->title;
            $oLoansLists->description       = $oLoan->description;
            $oLoansLists->date_cad          = implode('/',array_reverse(explode("-",$oLoan->date_cad)));
            $oLoansLists->date_dev          = $dev_book;
            $oLoansLists->situacao          = $oLoan->devolucao == false && strtotime($date_now) > strtotime($dev_book) ? 'Prazo Expirou' : 'Em dias';
            $oLoansLists->devolucao         = $oLoan->devolucao == true ? 'Sim' : 'Não';
            $oLoansList[] = $oLoansLists;
        }

        $sMsgErro = $this->sMsgErro;

        return view('site.loan.loan', compact('oLoansList', 'current', 'sMsgErro' ));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $oClients    = Client::all();
        $oBooks      = Book::select('books.*')->leftJoin('loans', 'id_book',  '=', 'books.id')->whereNull('id_book')->Orwhere('devolucao', true)->get();
        $sMsgErro   = $this->sMsgErro;
        $current    = 'loan';

        return view('site.loan.newloan', compact('current', 'oClients', 'oBooks', 'sMsgErro' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sMsgErro   = "";
        $current    = 'loan';
        $id_book    = $request->input('id_book');
        $id_client  = $request->input('id_client');

        $oVerificaEmprestimo = Loan::where('id_book', '=', $id_book)
            ->where('id_client', '=', $id_client)
            ->get();

        if (count($oVerificaEmprestimo) > 0) {
            $this->sMsgErro = "CPF Livro Já Emprestado!";
            return $this->create();
        }else{
            Loan::insert([
                [
                    'id_book' => $id_book, 
                    'id_client' => $id_client,
                    'devolucao' => false,
                    'date_cad' => date('Y-m-d')
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
