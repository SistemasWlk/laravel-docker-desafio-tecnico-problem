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
                      <h3>Emprestimo</h3>
                    </div>
                    <div class="widget-content">
                    @if(count($oLoansList) > 0) 
                        <table class="table table-ordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Livro</th>
                                    <th>Tipo</th>
                                    <th>Data</th>
                                    <th>Dt. Devolução</th>
                                    <th>Devolução</th>
                                    <th>Situação</th>
                                    <!-- <th>Ações</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($oLoansList as $vLoansList)
                                <tr>
                                    <td>{{$vLoansList->id}}</td>
                                    <td>{{$vLoansList->name}}</td>
                                    <td>{{$vLoansList->cpf}}</td>
                                    <td>{{$vLoansList->title}}</td>
                                    <td>{{$vLoansList->description}}</td>
                                    <td>{{$vLoansList->date_cad}}</td>
                                    <td>{{$vLoansList->date_dev}}</td>
                                    <td>{{$vLoansList->devolucao}}</td>
                                    <td>{{$vLoansList->situacao}}</td>
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
                        <a href="/loan/create" class="btn btn-sm btn-primary" role="button">Novo Registro</a>
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