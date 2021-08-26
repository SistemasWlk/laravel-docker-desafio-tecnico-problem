<?php

namespace App\Http\Controllers\DesafioTecnico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\ProblemOne;

class ProblemOneController extends Controller
{

    private $sMsgErro = "";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current       = 'problemone';
        $oProblemOne   = ProblemOne::all();
        $sMsgErro      = $this->sMsgErro;
        return view('site.problem_one.problemone', compact('oProblemOne', 'current', 'sMsgErro'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current  = 'problemone';
        $sMsgErro = $this->sMsgErro;
        return view('site.problem_one.newproblemone', compact('current', 'sMsgErro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current     = 'problemone';
        $height_one  = $request->input('height_one');
        $height_two  = $request->input('height_two');

        if (empty($height_one) || is_null($height_one) || $height_one == "" ) {
            $this->sMsgErro;
        }elseif (empty($height_two) || is_null($height_two) || $height_two == "") {
            $this->sMsgErro;
        }elseif ($height_one <= $height_two) {
            $this->sMsgErro;
        }else{

            $height_one_future = $height_one * 100;
            $height_two_future = $height_two * 100;
            $result     = 0;

            while ( $height_one_future >= $height_two_future) {
                $height_one_future += 2;
                $height_two_future += 3;
                $result++;
                //echo "result: $height_one_future - $height_two_future - $result <br />\n";
            }
            //die;
            ProblemOne::insert([
                [
                    'height_one'        => $height_one,
                    'height_two'        => $height_two,
                    'height_one_future' => $height_one_future/100,
                    'height_two_future' => $height_two_future/100,
                    'result'            => $result
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
