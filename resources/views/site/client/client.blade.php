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
                      <h3>Clientes</h3>
                    </div>
                    <div class="widget-content">
                    @if(count($oClientsTypeList) > 0) 
                        <table class="table table-ordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Data Nascimento</th>
                                    <th>Tipo</th>
                                    <!-- <th>Ações</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($oClientsTypeList as $vClients)
                                <tr>
                                    <td>{{$vClients->id}}</td>
                                    <td>{{$vClients->name}}</td>
                                    <td>{{$vClients->cpf}}</td>
                                    <td>{{implode('/',array_reverse(explode("-",$vClients->birth_date)))}}</td>
                                    <td>{{$vClients->description}}</td>
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
                        <a href="/client/create" class="btn btn-sm btn-primary" role="button">Novo Registro</a>
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