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
                        <h3>Cadastro de Cliente</h3>
                    </div>
                    <div class="widget-content">
                        @if($sMsgErro != "")
                        <div class="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{$sMsgErro}}
                        </div>
                        @endif
                        <form action="/client" method="POST">
                            {!! csrf_field() !!}
                            <div class="fields">
                                <div class="field">
                                    <label for="name">Nome</label>
                                    <input type="text" id="name" name="name" placeholder="Nome"/>
                                </div>
                                <div class="field">
                                    <label for="cpf">CPF</label>
                                    <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00"/>
                                </div>
                                <div class="field">
                                    <label for="birth_date">Data Nascimento</label>
                                    <input type="date" id="birth_date" name="birth_date" placeholder="Data do Nascimento"/>
                                </div>    
                                <div class="field">
                                    <label for="id_client_type">Tipo</label>
                                    @if(count($oClientType) > 0) 
                                    <select name="id_client_type" id="id_client_type">
                                        @foreach($oClientType as $vClientType)
                                        <option value="{{$vClientType->id}}">{{$vClientType->description}}</option>
                                        @endforeach 
                                    </select>
                                    @else
                                    <select name="id_client_type" id="id_client_type">
                                        <option value="">Nenhum</option>
                                    </select>
                                    @endif
                                </div>                                                        
                            </div> 
                            <br /><br />
                            <div class="actions">                             
                                <button type="button" class="btn btn-primary btn-sm" name="salvarclient" id="salvarclient">Salvar</button>
                            </div>                              
                        </form>
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

@section('javascript')
<script>

    $(document).ready(function(){
        $("#cpf").mask("999.999.999-99");
    });

    $("#salvarclient").click(function(){
        if ( $('#name').val() == "" ) {
            alert("Campo nome obrigatório!"); 
            return false;
        }else if ( $('#cpf').val() == "" ) {
            alert("Campo CPF obrigatório!"); 
            return false;
        }else if ( $('#birth_date').val() == "" ) {
            alert("Campo data nascimento obrigatório!"); 
            return false;
        }else if ( $('#id_client_type').val() == "" ) {
            alert("Tipo de cliente obrigatório!"); 
            return false;
        }else{
            $('form').submit();
        }
    });    

</script>
@endsection
