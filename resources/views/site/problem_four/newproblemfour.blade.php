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
                      <h3>Calculo Fibonacci</h3>
                    </div>
                    <div class="widget-content">
                        @if($sMsgErro != "")
                        <div class="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{$sMsgErro}}
                        </div>
                        @endif
                        <form action="/problemfour" method="POST">
                            {!! csrf_field() !!}
                            <div class="fields">
                                <div class="field">
                                    <label for="sequence_fibonacci">Números Separados Por Vírgula</label>
                                    <input type="text" id="sequence_fibonacci" name="sequence_fibonacci" class="only-number"/>
                                </div>                                                      
                            </div> 
                            <br /><br />
                            <div class="actions">                             
                                <button type="button" class="btn btn-primary btn-sm" name="salvarproblemfour" id="salvarproblemfour">Salvar</button>
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
    $("#salvarproblemfour").click(function(){
        var sequence_fibonacci_splint = $('#sequence_fibonacci').val().split(",");

        for (var i = 0; i < sequence_fibonacci_splint.length; i++) {
            if (sequence_fibonacci_splint[i] == '') {
                alert("Erro ao digitar sequencia!");
                return false;
            }
        }

        if ( $('#sequence_fibonacci').val() == "" ) {
            alert("Campo sequencia fibonacci obrigatório!"); 
            return false;
        }else{
            $('form').submit();
        }
    });  

    $("#sequence_fibonacci").keypress(function(){
        var $this   = $(this);
        var key     = (window.event)?event.keyCode:e.which;
        var dataAcceptDot   = $this.data('accept-dot');
        var dataAcceptComma = $this.data('accept-comma');
        var acceptDot   = (typeof dataAcceptDot     !== 'undefined' && (dataAcceptDot   == true || dataAcceptDot    == 1)?true:false);
        var acceptComma = (typeof dataAcceptComma   !== 'undefined' && (dataAcceptComma == true || dataAcceptComma  == 1)?true:false);

        if((key > 47 && key < 58) || (key == 46 && acceptDot) || (key == 44)) {
            return true;
        } else {
            return (key == 8 || key == 0)?true:false;
        }
    });  

</script>
@endsection
