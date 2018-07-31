<html>

<head>
    <title>Minha Figurinha</title>
    <meta charset="UTF-8">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/html2canvas.js"></script>
    <script src="js/jspdf.min.js"></script>
    <script src="js/kendo.all.min.js"></script>
    <script src="js/angular.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script>
        $(function () {
            $(".draggable").draggable();
        });
    </script>
</head>

<body>
    <div ng-app="">
        <div class="row">
            <div class="col-md-6 col-form">
                
                <div class="area">
                <h2>Minha Figurinha</h2>
                <p>
                    - Selecione o TIME da figurinha<br>
                    - Adicione uma FOTO sua<br>
                    - Arraste ela para mudar a POSIÇÃO<br>
                    - Ajuste o TAMANHO e a ROTAÇÃO<br>
                    - Insira seus DADOS<br>
                    - Aperte o BOTÃO para salvar suas figurinhas
                </p>
                    <label>Time:</label>
                    <select ng-model="figTipo" id="tipo">
                        <option value="brasil">Brasil</option>
                        <option value="internacional" selected>Internacional</option>
                        <option value="gremio">Grêmio</option>
                    </select>

                    <label>Foto:</label>
                    <input id="file" onchange='getFileName(this)' fileread="uploadme1.src" type="file">

                    <label>Tamanho:</label>
                    <input type="range" ng-model="figSize" min="1" max="200" />

                    <label>Rotação:</label>
                    <input type="range" ng-model="figRoda" min="-100" max="100" />

                    <!-- <label>Horizontal:</label>
                    <input type="range" ng-model="figHoriz" min="-200" max="200" />

                    <label>Vertical:</label>
                    <input type="range" ng-model="figVerti" min="-200" max="200" /> -->

                    <label>Nome:</label>
                    <input id="nome" type="text" ng-model="figNome" value="Bruno Tourn Bozzetti">

                    <label>Data:</label>
                    <input type="text" ng-model="figData" value="27/11/1986">

                    <label>Time - Cidade:</label>
                    <input type="text" ng-model="figDados" value="Inter - Porto Alegre RS">

                    <label>&nbsp;</label>
                    <div class="row">
                        <!-- <div class="col-md-6">
                            <input id="btn-Preview-Image" type="button" value="PNG" />
                        </div> -->
                        <div class="col-md-12">
                            <input id="pdfDown" type="button" value="Gerar Figurinhas - PDF Tamanho A3" /> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-preview">
                <div class="figurinha">
                    <div class="figurinha__drag draggable">
                        <img class="figurinha__foto" src="imgs/avatar.jpg" style="width:{{ figSize }}%; transform:rotate({{figRoda/4}}deg);"/>
                    </div>
                    <div class="figurinha__mascara" style="background-image: url('figurinhas/figurinha_{{figTipo}}.png');"></div>
                    <span class="figurinha__data">{{ figData }}</span>
                    <span class="figurinha__nome">{{ figNome }}</span>
                    <span class="figurinha__dados">{{ figDados }}</span>
                </div>
            </div>
        </div>
        
        <div class="a3">
            <p>
                Desenvolvido por Bruno Bozzetti<br>
                www.brunobozz.com<br>
                Instagram: @brunobozz<br>
                E-mail: brunobozz@gmail.com</p>
            <?php
                for($i=1; $i<=32; $i++){
            ?>
            <div class="figurinha">
                    <div class="figurinha__drag draggable draggable_copy" >
                        <img class="figurinha__foto" src="avatar.jpg" style="width:{{ figSize }}%; transform:rotate({{figRoda/4}}deg);" />
                    </div>
                    <div class="figurinha__mascara" style="background-image: url('figurinhas/figurinha_{{figTipo}}.png');"></></div>
                    <span class="figurinha__data">{{ figData }}</span>
                    <span class="figurinha__nome">{{ figNome }}</span>
                    <span class="figurinha__dados">{{ figDados }}</span>
                </div>
            <?php
                }
            ?>
        </div>
    </div>

    <script src="funcoes.js"></script>


</body>

</html>