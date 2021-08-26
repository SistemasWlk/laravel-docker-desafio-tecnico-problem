<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container"> 
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> 
            </a>
            <a class="brand" href="/">Desafio Técnico</a>
            <div class="nav-collapse"></div>
            <!--/.nav-collapse --> 
        </div>
    <!-- /container --> 
    </div>
    <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
    <div class="subnavbar-inner" style="height: 40px;">
        <div class="container">
            <ul class="mainnav">
                <li @if($current=="home") class="active" @else class="" @endif style="height: 40px;">
                    <a href="/">
                        <span style="padding-top: 10px">Dashboard</span>
                    </a> 
                </li>
                <li @if($current=="problemone") class="active" @else class="" @endif style="height: 40px;">
                    <a href="/problemone">
                        <span style="padding-top: 10px">Calculo Idade</span>
                    </a> 
                </li>
                <li @if($current=="problemfour") class="active" @else class="" @endif style="height: 40px;">
                    <a href="/problemfour">
                        <span style="padding-top: 10px">Sequencia Fibonacci</span>
                    </a> 
                </li>
                <li @if($current=="clienttype") class="active" @else class="" @endif style="height: 40px;">
                    <a href="/clienttype">
                        <span style="padding-top: 10px">&nbsp;&nbsp;&nbsp;Tipo Cliente&nbsp;&nbsp;&nbsp;</span>
                    </a> 
                </li>
                <li @if($current=="client") class="active" @else class="" @endif style="height: 40px;">
                    <a href="/client">
                        <span style="padding-top: 10px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cliente&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </a> 
                </li>
                <li @if($current == "book") class="active" @else class="" @endif style="height: 40px;">
                    <a href="/book">
                        <span style="padding-top: 10px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Livro&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </a> 
                </li>  
                <li @if($current == "loan") class="active" @else class="" @endif style="height: 40px;">
                    <a href="/loan">
                        <span style="padding-top: 10px">Emprestimo de Livro</span>
                    </a> 
                </li>    
                <li style="height: 40px;">
                    <a href="" ><span style="padding-top: 10px"></span> 
                    </a> 
                </li>
            </ul>
        </div>
        <!-- /container --> 
    </div>
    <!-- /subnavbar-inner --> 
</div>