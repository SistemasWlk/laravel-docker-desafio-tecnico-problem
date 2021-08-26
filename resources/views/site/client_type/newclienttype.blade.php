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
                      <h3>Cadastro Tipo Corrida</h3>
                    </div>
                    <div class="widget-content">
                        @if($sMsgErro != "")
                        <div class="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{$sMsgErro}}
                        </div>
                        @endif
                        <form action="/clienttype" method="POST">
                            {!! csrf_field() !!}
                            <div class="fields">
                                <div class="field">
                                    <label for="description">Descrição</label>
                                    <input type="test" id="description" name="description" placeholder="Descrição"/>
                                </div>  
                                <div class="field">
                                    <label for="devolution">Devolução</label>
                                    <input type="number" id="devolution" name="devolution" placeholder="Devolução"/>
                                </div>                                                      
                            </div> 
                            <br /><br />
                            <div class="actions">                             
                                <button type="button" class="btn btn-primary btn-sm" name="salvatipocliente" id="salvatipocliente">Salvar</button>
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
    $("#salvatipocliente").click(function(){
        if ( $('#description').val() == "" ) {
            alert("Campo descrição obrigatório!"); 
            return false;
        }else if( $('#devolution').val() == "" ) {
            alert("Campo devolução obrigatório!"); 
            return false;
        }else{
            $('form').submit();
        }
    });    

</script>
@endsection
