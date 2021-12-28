<?php

$item = null;
$valor = null;
// $orden = "id";

$mTotalPagosDirect = ControladorPagoDirecto::ctrSumrPagosDirectos($item,$valor);
$mMediaPagosDirect = ControladorPagoDirecto::ctrMediaPagosDirectos($item,$valor);
$PagosDirect = ControladorPagoDirecto::ctrMostrarPagosDirectos($item,$valor);
$recordsTotalPagoDirec = count($PagosDirect);



// $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
// $totalCategorias = count($categorias);

// $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
// $totalClientes = count($clientes);

// $productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
// $totalProductos = count($productos);

?>



<!-- <div class="col-lg-3 col-xs-6">

  <div class="small-box bg-aqua">
    
    <div class="inner">
      
      <h3>$<?php //echo number_format($ventas["total"],2); ?></h3>

      <p>Ventas</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion ion-social-usd"></i>
    
    </div>
    
    <a href="ventas" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div> -->

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-green">
    
    <div class="inner">
    
      <h3><?php echo number_format($recordsTotalPagoDirec); ?></h3>

      <p>Total Records</p>
    
    </div>
    
    <div class="icon">
    
      <i class="ion ion-clipboard"></i>
    
    </div>
    
    <a href="pagosdirecto" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-yellow">
    
    <div class="inner">
    
      <h3><?php echo number_format($mTotalPagosDirect["monto"],2); ?></h3>

      <p>Total Cobranza</p>
  
    </div>
    
    <div class="icon">
    
      <i class="ion ion-person-add"></i>
    
    </div>
    
    <a href="pagosdirecto" class="small-box-footer">

      Más info <i class="fa fa-arrow-circle-right"></i>

    </a>

  </div>

</div>




<div class="col-lg-3 col-xs-6">

<table id="PromedioTable" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Medio de Pago</th>
        <th>Promedio</th>
      </tr>
    </thead>
    <tbody>

        <?php //foreach ($mMediaPagosDirect as $key => $value){;


          foreach ($mMediaPagosDirect as $key => $value){
                              
            echo ' <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["medio_de_pago"].'</td>
                    <td>'.$value["media"].'</td>
                  </tr>';
          } ?>

    </tbody>
</table>

</div>