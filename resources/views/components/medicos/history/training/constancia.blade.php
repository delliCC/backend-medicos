<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style type="text/css">
            @page {
                    margin: 0;
                }
            div.header {
                top: 0.5cm;
                left: 0cm;
                border-bottom-width: 1px;
                font-size: 13px;
                height: 200px;
                position: fixed;
                width: 100%;
                overflow: hidden;
                padding: 0.5cm 1cm;
            }
            .principal {
                width: 190mm;
                font-size: 14px;
                border-collapse: collapse;
                border-color: #ddd;
            }
            .relleno {
                background-color: #b1b7ba;
            
            }
            .relleno1 {
                background-color: #E1E1E1;
            
            }
            
            table {
                line-height: 1;
                width: 100%;
            }
        </style>
    </head>
    <body>
        {{--  style=" background-image: url('https://fymsa.s3.us-east-2.amazonaws.com/paginaOfertas/ofertas/JYz1SO-1626201954.jpg'); background-repeat: no-repeat;"  --}}
        <div style="position: absolute; top: 58%; left: 58%; transform: translate(-50%, -50%);">
    
            <p style="padding:0px; margin: 0px; text-align: center; font-size: 20px;"><b>SE OTORGA LA PRESENTE</b></p><br>
            <div style="width: 100%" align="center">
                <h1 style="padding-bottom:0px; margin: 0px; font-size: 58px; color: #009115;"><b>CONSTANCIA</b> <span style="padding:0px; margin: 0px; color: #000000; font-size: 25px;"> A: </span></h1>
            </div><br><br><br>
    
            <div style="text-align: center;">
                <p style="font-size: 30px; font-family: 'Oswald', sans-serif;">{{$datos->medico->nombre}} {{$datos->medico->apellido_paterno}} {{$datos->medico->apellido_materno}}</p>
                <div style="text-align: center; width: 500px; height: 1px; background: #4c4c4e;"></div><br><br>
                <p style="text-align: center; font-size: 15px;">POR HABER COMPLETADO EXITOSAMENTE LAS EVALUACIONES CORRESPONDIENTES AL PERFIL DE: </p>
                <p style="font-size: 18px; color: #000000; font-family: 'Oswald', sans-serif; text-transform: uppercase;"><b>{{$datos->training->nombre}}</b></p>
            </div><br><br><br><br><br><br><br><br><br>
        
        
            <!-- <div style="text-align: center; width: 200px; height: 1px; background: #4c4c4e; margin:auto"></div> -->
            <p style="padding:0px; margin: 0px;text-align: center; font-size: 15px; color:#4c4c4e; "><b>Fecha de expedición</b></p>
            <p style="padding:0px; margin: 0px; text-align: center; font-size: 15px; color:#4c4c4e;"><b>{{$datos->fecha_fin}}</b></p>
            <br><br>

        </div>
    </body>
</html>
