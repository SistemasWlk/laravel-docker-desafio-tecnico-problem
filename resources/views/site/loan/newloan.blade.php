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
                        <h3>Cadastro de Emprestimo</h3>
                    </div>
                    <div class="widget-content">
                        @if($sMsgErro != "")
                        <div class="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{$sMsgErro}}
                        </div>
                        @endif
                        <form action="/loan" method="POST">
                            {!! csrf_field() !!}
                            <div class="fields">
                                <div class="field">
                                    <label for="id_client">Cliente</label>
                                    @if(count($oClients) > 0) 
                                    <select name="id_client" id="id_client">
                                        @foreach($oClients as $oClient)
                                        <option value="{{$oClient->id}}">{{$oClient->name}}</option>
                                        @endforeach 
                                    </select>
                                    @else
                                    <select name="id_client" id="id_client">
                                        <option value="">Nenhum</option>
                                    </select>
                                    @endif
                                </div>
                                <div class="field">
                                    <label for="id_book">Livro</label>
                                    @if(count($oBooks) > 0) 
                                    <select name="id_book" id="id_book">
                                        @foreach($oBooks as $oBook)
                                        <option value="{{$oBook->id}}">{{$oBook->title}}</option>
                                        @endforeach 
                                    </select>
                                    @else
                                    <select name="id_book" id="id_book">
                                        <option value="">Nenhum</option>
                                    </select>
                                    @endif
                                </div>
                            </div>                                                        
                            <br /><br />
                            <div class="actions">                             
                                <button type="button" class="btn btn-primary btn-sm" name="salvarloan" id="salvarloan">Salvar</button>
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

    $("#salvarloan").click(function(){
        if ( $('#id_book').val() == "" ) {
            alert("Campo livro obrigatório!"); 
            return false;
        }else if ( $('#id_client').val() == "" ) {
            alert("Campo cliente obrigatório!"); 
            return false;
        }else{
            $('form').submit();
        }
    });    

</script>
@endsection
