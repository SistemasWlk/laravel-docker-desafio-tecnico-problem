<?php

namespace App\Http\Controllers\DesafioTecnico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\ProblemFour;

class ProblemFourController extends Controller
{

    private $sMsgErro = "";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current       = 'problemfour';
        $oProblemfour   = Problemfour::all();
        $sMsgErro      = $this->sMsgErro;
        return view('site.problem_four.problemfour', compact('oProblemfour', 'current', 'sMsgErro'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current  = 'problemfour';
        $sMsgErro = $this->sMsgErro;
        return view('site.problem_four.newproblemfour', compact('current', 'sMsgErro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current             = 'problemfour';
        $sequence_fibonacci  = $request->input('sequence_fibonacci');
        $bErro               = false;
        $result_fibonacci    = array();

        $sequence_fibonacci_array = explode(',', $sequence_fibonacci);
        sort($sequence_fibonacci_array);

        for ($i=0; $i < count($sequence_fibonacci_array); $i++) { 
            if ($sequence_fibonacci_array[$i] == '') {
                $bErro =  true;
                break;
            }
        }

        if (empty($sequence_fibonacci) || is_null($sequence_fibonacci) || $sequence_fibonacci == "" ) {
            $this->sMsgErro = "Campo sequencia fibonacci obrigatório!";
        }elseif($bErro){
            $this->sMsgErro = "Erro ao digitar sequencia!";
        }else{

            for ($i=0; $i < count($sequence_fibonacci_array); $i++) { 
                $numero1             = 0;
                $numero2             = 1;
                $numeric_fibonacci   = 0; 
                while ( $numeric_fibonacci <= max($sequence_fibonacci_array) ) {
                    $numeric_fibonacci = $numero1 + $numero2;
                    $numero1 = $numero2;
                    $numero2 = $numeric_fibonacci;
                    if ($numeric_fibonacci == $sequence_fibonacci_array[$i]) {
                        $result_fibonacci[] = $numeric_fibonacci;
                        break;
                    }
                }
            }

            Problemfour::insert([
                [
                    'sequence_fibonacci'  => implode(", ", $sequence_fibonacci_array),
                    'result_fibonacci'    => implode(", ", $result_fibonacci)
                ],
            ]);
            return $this->index(); 
        }

        return $this->create();
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
