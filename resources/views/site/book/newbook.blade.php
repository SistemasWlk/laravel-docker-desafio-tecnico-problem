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
                        <h3>Cadastro de Livro</h3>
                    </div>
                    <div class="widget-content">
                        @if($sMsgErro != "")
                        <div class="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{$sMsgErro}}
                        </div>
                        @endif
                        <form action="/book" method="POST">
                            {!! csrf_field() !!}
                            <div class="fields">
                                <div class="field">
                                    <label for="title">Titulo</label>
                                    <input type="text" id="title" name="title" placeholder="Titulo"/>
                                </div>
                                <div class="field">
                                    <label for="author">Autor</label>
                                    <input type="text" id="author" name="author" placeholder="Autor"/>
                                </div>
                                <div class="field">
                                    <label for="pages">Páginas</label>
                                    <input type="numeric" id="pages" name="pages" placeholder="Páginas"/>
                                </div>                                                          
                            </div> 
                            <br /><br />
                            <div class="actions">                             
                                <button type="button" class="btn btn-primary btn-sm" name="salvarbook" id="salvarbook">Salvar</button>
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

    $("#salvarbook").click(function(){
        if ( $('#title').val() == "" ) {
            alert("Campo titulo obrigatório!"); 
            return false;
        }else if ( $('#author').val() == "" ) {
            alert("Campo autor obrigatório!"); 
            return false;
        }else if ( $('#pages').val() == "" ) {
            alert("Campo páginas obrigatório!"); 
            return false;
        }else{
            $('form').submit();
        }
    });    

</script>
@endsection