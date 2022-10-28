<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style type="text/css">
            @page {
                margin: 0cm 0cm;
            }
            body {
                font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, sans-serif;
                margin-top: 4cm;
                margin-left: 1cm;
                margin-right: 1cm;
                margin-bottom: 2cm;
            }    

            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
            }

            .head-title{
                text-align: center;
                font-size: 13px;
            }

            footer {
                position: fixed; 
                width: 100%;
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
            }
            .relleno {
                background-color: #F4F4F4;
            }

            .m-0{
                margin: 0px;
            }
            .p-0{
                padding: 0px;
            }
            .pt-5{
                padding-top:5px;
            }
            .mt-10{
                margin-top:10px;
            }
        
            .title {
                font-size: 15px;
            }

            .tablaBody {
                width: 100%;
                font-size: 13px;
                border-collapse: collapse;
                {{--  border-color: #ddd;  --}}
            }

        </style>
    </head>
    {{--  <body>
        <header>
            <img src="https://laboratorios-chontalpa-file.s3.amazonaws.com/Header.png" id="blog-feature-image" width="100%" alt="encabezado"/>
        </header>

        <div class="head-title">
            <h1 class="m-0 p-0">Solicitud de empleo</h1>
        </div>


        <span class="seccion"><strong>Conocimientos Generales</strong></span>
    
        <footer>
            <img src="https://laboratorios-chontalpa-file.s3.amazonaws.com/Footer.png" id="blog-feature-image" width="100%" alt="encabezado"/>
        </footer>
    </body>  --}}
    <body style=" background-image: url('https://fymsa.s3.us-east-2.amazonaws.com/paginaOfertas/ofertas/JYz1SO-1626201954.jpg'); background-repeat: no-repeat;">

        <div style="position: absolute; top: 58%; left: 58%; transform: translate(-50%, -50%);">
    
            <p style="padding:0px; margin: 0px; text-align: center; font-size: 20px;"><b>SE OTORGA LA PRESENTE</b></p><br>
            <div style="width: 100%" align="center">
                <h1 style="padding-bottom:0px; margin: 0px; font-size: 58px; color: #193791;"><b>CONSTANCIA</b> <span style="padding:0px; margin: 0px; color: #000000; font-size: 25px;"> A: </span></h1>
            </div><br><br><br>
    
            <div style="text-align: center;">
                <p style="font-size: 30px; font-family: 'Oswald', sans-serif;">{{$datos->medico->nombre}} {{$datos->medico->apellido_paterno}} {{$datos->medico->apellido_materno}}</p>
                <div style="text-align: center; width: 500px; height: 1px; background: #4c4c4e;"></div><br><br>
                <p style="text-align: center; font-size: 15px;">POR HABER COMPLETADO EXITOSAMENTE LAS EVALUACIONES CORRESPONDIENTES AL PERFIL DE: </p>
                <p style="font-size: 18px; color: #000000; font-family: 'Oswald', sans-serif; text-transform: uppercase;"><b>{{$datos->webinar->nombre}}</b></p>
            </div><br><br><br><br><br><br><br><br><br>
    
        
            <!-- <div style="text-align: center; width: 200px; height: 1px; background: #4c4c4e; margin:auto"></div> -->
            <p style="padding:0px; margin: 0px;text-align: center; font-size: 15px; color:#4c4c4e; "><b>Fecha de expedición</b></p>
            <p style="padding:0px; margin: 0px; text-align: center; font-size: 15px; color:#4c4c4e;"><b>{{$datos->fecha_fin}}</b></p>
            <br><br>

        </div>
    </body>

</html>
