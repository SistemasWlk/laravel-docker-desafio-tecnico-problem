@extends('layouts.principal')

@section('conteudo')
@include('layouts.header')
<!-- /section -->
<div class="section">
    <!-- container --> 
    <div class="container">
        <!-- row --> 
        <div class="row">
            <div class="span12">          
                <div class="widget ">
                    <div class="widget-header">
                        <h3>Calculo Altura</h3> 
                    </div>  
                    <div class="widget-content">
                    @if(count($oProblemOne) > 0) 
                        <table class="table table-ordered table-hover">
                            <thead>
                                <tr>
                                    <th>Altura de Chico</th>
                                    <th>Altura de Juca</th>
                                    <th>Altura de Chico Futura</th>
                                    <th>Altura de Juca Futura</th>
                                    <th>Qt. Anos</th>
                                    <!-- <th>Ações</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($oProblemOne as $vProblemOne)
                                <tr>
                                    <td>{{$vProblemOne->height_one}}</td>
                                    <td>{{$vProblemOne->height_two}}</td>
                                    <td>{{$vProblemOne->height_one_future}}</td>
                                    <td>{{$vProblemOne->height_two_future}}</td>
                                    <td>{{$vProblemOne->result}}</td>
        <!--                             <td>
                                        <a href="" class="btn btn-sm btn-primary">Editar</a>
                                        <a href="" class="btn btn-sm btn-danger">Apagar</a>
                                    </td> -->
                                </tr>
                                @endforeach           
                            </tbody>
                        </table>
                    @endif  
                    </div>
                    <div class="card-footer">
                        <br />
                        <a href="/problemone/create" class="btn btn-sm btn-primary" role="button">Novo Registro</a>
                    </div>
                </div>
            </div>   
        </div> 
        <!-- /row --> 
    </div>
    <!-- /container --> 
</div>
<!-- /section -->
@endsection