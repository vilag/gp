<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
  <script src="js/moment.min.js"></script>
    <div class="container">
        <div class="row">
            <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" style="margin-top: 10px; margin-bottom: 30px; text-align: left; padding-left: 20px; padding-top: 20px;">
                <b onclick="regresar();" style="cursor: pointer; border-radius: 5px; padding: 10px; color: #fff; background-color: #122742;">Regresar</b>
            </div>
            <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" style="margin-top: 10px; margin-bottom: 10px; text-align: center;">
                <label for="">Total:</label>&nbsp;<b id="suma_gastos"></b><br><label for="" id="nom_categoria"></label>&nbsp;<b id="suma_cat"></b>
                
            </div>
            <!-- <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" style="margin-top: 20px; box-shadow: 5px 5px 10px rgba(0,0,0,0.2); padding-top: 10px;"> -->
                <div style="width: 100%; text-align: center; color: #9D2904;">
                    <b id="sub_pagos1" style="font-size: 20px;"></b>
                </div>
                <div style="width: 2000px; height: 120px; background-color: white; overflow: scroll;" id="pagos_rapidos_1">
                </div>
            <!-- </div> -->
            <!-- <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" style="margin-top: 20px; box-shadow: 5px 5px 10px rgba(0,0,0,0.2); padding-top: 10px;"> -->
                <div style="width: 100%; text-align: center; color: #9D2904;">
                    <b id="sub_pagos2" style="font-size: 20px;"></b>
                </div>
                <div style="width: 2000px; height: 120px; background-color: white; overflow: scroll;" id="pagos_rapidos_2">
                </div>
            <!-- </div> -->
            <!-- <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" style="margin-top: 20px; box-shadow: 5px 5px 10px rgba(0,0,0,0.2); padding-top: 10px;"> -->
                <div style="width: 100%; text-align: center; color: #9D2904;">
                    <b id="sub_pagos3" style="font-size: 20px;"></b>
                </div>
                <div style="width: 2000px; height: 120px; background-color: white; overflow: scroll;" id="pagos_rapidos_3">
                </div>
            <!-- </div> -->
            
            <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" style="margin-top: 20px;">
                <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" id="box_categorias" style="padding-left: 5%;">

                </div>
                <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" id="div_select_cat" style="display: none;">
                    <label for="">Categoria</label>
                    <select id="select_categorias" class="form-control">
                        <option value="">SELECCIONAR </option>
                    </select>
                    
                </div>
                
            </div>
            <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" id="div_datos_cat" style="margin-top: 20px; display: none;">
                <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" style="margin-top: 20px;">
                    <label for="">Concepto</label>
                    <input type="hidden" id="idcategoria">
                    <input id="concepto" type="text" class="form-control">
                </div>
                <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" style="margin-top: 20px;">
                    <label for="">Monto</label>
                    <input id="monto" type="number" class="form-control">
                </div>
                <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" style="margin-top: 20px;">
                    <button onclick="guardar();" class="form-control" style=" background-color: rgb(22, 34, 62); color: azure;">GUARDAR</button>
                </div>
                <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12" style="width: 100%; overflow: scroll; margin-top: 20px; height: 300px;">
                    <table class="table" style="width: 800px;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Movimiento</th>
                                <th scope="col">Monto</th>
                                <th scope="col">Fecha</th>
                            </tr>
                        </thead>
                        <tbody id="lineas">
                            
                        </tbody>
                    </table>
                </div>
            </div>

            
        </div>

    </div>
    <script type="text/javascript" src="scripts/index.js?v=<?php echo(rand()); ?>"></script>
    <script src="js/moment.min.js"></script>
    <!-- <script src="js/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>