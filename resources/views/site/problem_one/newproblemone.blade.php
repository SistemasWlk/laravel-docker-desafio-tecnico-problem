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
                        @if($sMsgErro != "")
                        <div class="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{$sMsgErro}}
                        </div>
                        @endif
                        <form action="/problemone" method="POST">
                            {!! csrf_field() !!}
                            <div class="fields">
                                <div class="field">
                                    <label for="height_one">Altura de Chico</label>
                                    <input type="number" id="height_one" name="height_one"/>
                                </div>       
                                <div class="field">
                                    <label for="height_two">Altura de Juca</label>
                                    <input type="number" id="height_two" name="height_two"/>
                                </div>                                                
                            </div> 
                            <br /><br />
                            <div class="actions">                             
                                <button type="button" class="btn btn-primary btn-sm" name="salvarproblemone" id="salvarproblemone">Calcular</button>
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
    $("#salvarproblemone").click(function(){
        if ( $('#height_one').val() == "" ) {
            alert("Campo altura de Chico obrigatório!!"); 
            return false;
        }else if ( $('#height_two').val() == "" ) {
            alert("Campo altura de Juca obrigatório!"); 
            return false;
        }else if ( $('#height_one').val() <= $('#height_two').val()  ) {
            alert("A altura de chico tem que ser maior que a de Juca."); 
            return false;
        }else{
            $('form').submit();
        }
    });  

</script>
@endsection
