{{--  <!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Aloha!</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top"><img src="https://via.placeholder.com/150" alt="" width="150"/></td>
        <td align="right">
            <h3>Shinra Electric power company</h3>
            <pre>
                Company representative name
                Company address
                Tax ID
                phone
                fax
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
        <td><strong>From:</strong> Linblum - Barrio teatral</td>
        <td><strong>To:</strong> Linblum - Barrio Comercial</td>
    </tr>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Unit Price $</th>
        <th>Total $</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Playstation IV - Black</td>
        <td align="right">1</td>
        <td align="right">1400.00</td>
        <td align="right">1400.00</td>
      </tr>
      <tr>
          <th scope="row">1</th>
          <td>Metal Gear Solid - Phantom</td>
          <td align="right">1</td>
          <td align="right">105.00</td>
          <td align="right">105.00</td>
      </tr>
      <tr>
          <th scope="row">1</th>
          <td>Final Fantasy XV - Game</td>
          <td align="right">1</td>
          <td align="right">130.00</td>
          <td align="right">130.00</td>
      </tr>
    </tbody>

    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">Subtotal $</td>
            <td align="right">1635.00</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Tax $</td>
            <td align="right">294.3</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Total $</td>
            <td align="right" class="gray">$ 1929.3</td>
        </tr>
    </tfoot>
  </table>

</body>
</html>  --}}

<!DOCTYPE html>
<html>
<head>
    <title>Solicitud de empleo</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
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
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;   
    }
    .w-85{
        width:85%;   
    }
    .w-15{
        width:15%;   
    }
    .logo img{
        width:45px;
        height:45px;
        padding-top:30px;
    }
    .logo span{
        margin-left:8px;
        top:19px;
        position: absolute;
        font-weight: bold;
        font-size:25px;
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
</style>
<body>
<div class="head-title">
    <img src="https://laboratorios-chontalpa-file.s3.amazonaws.com/vacantes/Encabezado-02.png" id="blog-feature-image" class="rounded mr-2 mb-1 mb-md-0" width="100%" height="100" alt="encabezado"/>

    <h1 class="text-center m-0 p-0">Solicitud de empleo</h1>
</div>
<div class="add-detail mt-10">
    <table width="100%" style="border: hidden"  >
        <tr>
            <td valign="top" width="40%"><img src="https://via.placeholder.com/150" alt="" /></td>
            <td width="60%">
                <div class="table-section bill-tbl w-100 mt-10">
                    <table class="default">
                        <tbody>
                            <tr>
                                <th colspan="2" scope="rowgroup">FECHA: {{$datos->fecha_postulacion}}</th>
                            </tr>
                            <tr>
                                <td>Puesto Solicitado: </td>
                                <td>{{$datos->vacantes->puesto->puesto}}</td>
                            </tr>
                            <tr>
                                <td>Sucursal: </td>
                                <td>{{$datos->vacantes->sucursal->sucursal}}</td>
                            </tr>
                            <tr>
                                <td>Sueldo pretendido mensual: </td>
                                <td>${{$datos->sueldoPretendido}}</td>
                            </tr>
                        </tbody>
                    </table>
                    {{--  <table class="table w-100 mt-10">
                        <tr>
                            <th class="w-50">Puesto Solicitado</th>
                            <th class="w-50">Sucursal</th>
                        </tr>
                        <tr>
                            <td>
                                <p>{{$datos->vacantes->puesto->puesto}}</p>
                            </td>
                            <td>
                                <p>{{$datos->vacantes->sucursal->sucursal}}</p>
                            </td>
                        </tr>
                        <tr>
                            <th class="w-50">Fecha</th>
                            <th class="w-50">Sueldo pretendido mensual</th>
                        </tr>
                        <tr>
                            <td>
                                <p>{{$datos->fecha_postulacion}}</p>
                            </td>
                            <td>
                                <p>${{$datos->sueldoPretendido}}</p>
                            </td>
                        </tr>
                    </table>  --}}
                </div>
            </td>
        </tr>
    </table>
    <div style="clear: both;"></div>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="default">
        <tbody>
          <tr>
            <th colspan="6" scope="rowgroup">Datos Personales</th>
          </tr>
          <tr>
            <td>Nombre: </td>
            <td>{{$datos->nombre}} {{$datos->apellido_paterno}} {{$datos->apellido_materno}}</td>
            <td>Edad:</td>
            <td>{{$datos->edad}} años</td>
            <td>Sexo:</td>
            <td>{{$datos->sexo}}</td>
          </tr>
          <tr>
            <td>Lugar de Nacimiento: </td>
            <td>{{$datos->lugar_nacimiento}}</td>
            <td>Estado:</td>
            <td>{{$datos->estado}}</td>
            <td>Municipio:</td>
            <td>{{$datos->municipio}}</td>
          </tr>
          <tr>
            <td>Domicilio: </td>
            <td colspan="5">{{$datos->direccion}}</td>
          </tr>
        </tbody>
      </table>
    {{--  <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Datos Personales</th>
        </tr>
        <tr>
            <td>

                 style="border: hidden"  
                
            </td>
        </tr>
    </table>  --}}
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Payment Method</th>
            <th class="w-50">Shipping Method</th>
        </tr>
        <tr>
            <td>Cash On Delivery</td>
            <td>Free Shipping - Free Shipping</td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">SKU</th>
            <th class="w-50">Product Name</th>
            <th class="w-50">Price</th>
            <th class="w-50">Qty</th>
            <th class="w-50">Subtotal</th>
            <th class="w-50">Tax Amount</th>
            <th class="w-50">Grand Total</th>
        </tr>
        <tr align="center">
            <td>$656</td>
            <td>Mobile</td>
            <td>$204.2</td>
            <td>3</td>
            <td>$500</td>
            <td>$50</td>
            <td>$100.60</td>
        </tr>
        <tr align="center">
            <td>$656</td>
            <td>Mobile</td>
            <td>$254.2</td>
            <td>2</td>
            <td>$500</td>
            <td>$50</td>
            <td>$120.00</td>
        </tr>
        <tr align="center">
            <td>$656</td>
            <td>Mobile</td>
            <td>$554.2</td>
            <td>5</td>
            <td>$500</td>
            <td>$50</td>
            <td>$100.00</td>
        </tr>
        <tr>
            <td colspan="7">
                <div class="total-part">
                    <div class="total-left w-85 float-left" align="right">
                        <p>Sub Total</p>
                        <p>Tax (18%)</p>
                        <p>Total Payable</p>
                    </div>
                    <div class="total-right w-15 float-left text-bold" align="right">
                        <p>$20</p>
                        <p>$20</p>
                        <p>$330.00</p>
                    </div>
                    <div style="clear: both;"></div>
                </div> 
            </td>
        </tr>
    </table>
</div>
</html>