var idpago_rapido_1 = 0;
var concepto_1 = "";
var idcategoria_1 = 0;
var monto_1 = 0;   
var idpago_rel_1 = 0;
var estatus_1 = 0;

function init()
{
    listar_categorias();
    listar_categorias_box();
    suma_gastos();
    listar_movimientos();
    listar_pagos_rapidos();
}

function listar_categorias()
{
    
    var fecha=moment().format('YYYY-MM-DD');
    //console.log("entra");
    $.post("ajax/index.php?op=listar_categorias&fecha="+fecha,function(r){
    $("#select_categorias").html(r);
             
    });
}
function listar_categorias_box()
{
    var fecha=moment().format('YYYY-MM-DD');
    //console.log("entra");
    $.post("ajax/index.php?op=listar_categorias_box&fecha="+fecha,function(r){
    $("#box_categorias").html(r);
             
    });
}

function guardar()
{

    var fecha=moment().format('YYYY-MM-DD');
	var hora=moment().format('HH:mm:ss');
	var fecha_hora=fecha+" "+hora;
    var monto_capt = $("#monto").val();

    console.log(idcategoria_1+" idcategoria "+concepto_1+" concepto "+monto_1+" monto ");

    if (idcategoria_1>0 && concepto_1!="" && monto_1>0) {
        $.post("ajax/index.php?op=guardar",{idcategoria_1:idcategoria_1,concepto_1:concepto_1,monto_1:monto_1,fecha_hora:fecha_hora,idpago_rapido_1:idpago_rapido_1,monto_capt:monto_capt},function(data, status)
		{
			data = JSON.parse(data);

            alert("Guardado exitosamente");
            $("#select_categorias").val("");
            $("#concepto").val("");
            $("#monto").val("");
            $("#idcategoria").val("");
            $("#box_categorias").show();
            document.getElementById("box_pagosrapidos").style.display="block";

            listar_movimientos();
            suma_gastos();
            listar_categorias_box();
            listar_pagos_rapidos();

            idpago_rapido_1 = 0;
            concepto_1 = "";
            idcategoria_1 = 0;
            monto_1 = 0;   
            idpago_rel_1 = 0;
            estatus_1 = 0;
			
		});
    }else{
        alert("Por favor capture todos los campos");
    }
        
}

function listar_movimientos()
{
    var fecha=moment().format('YYYY-MM-DD');
	var hora=moment().format('HH:mm:ss');
	var fecha_hora=fecha+" "+hora;

    $.post("ajax/index.php?op=listar_movimientos&fecha="+fecha,function(r){
    $("#lineas").html(r);
                 
    });
}

function suma_gastos()
{
    var fecha=moment().format('YYYY-MM-DD');

        $.post("ajax/index.php?op=suma_gastos",{fecha:fecha},function(data, status)
		{
			data = JSON.parse(data);

            $("#suma_gastos").text("$ "+data.total);
            $("#sub_pagos1").text("$ "+data.pagos1);
            $("#sub_pagos2").text("$ "+data.pagos2);
            $("#sub_pagos3").text("$ "+data.pagos3);
			
		});
}

function select_cat(idcategoria,nombre,suma){
  
    idcategoria_1 = idcategoria;
    $("#idcategoria").val(idcategoria);
    $("#nom_categoria").text(nombre);
    $("#suma_cat").text("$ "+suma);
    $("#box_categorias").hide();
    document.getElementById("div_datos_cat").style.display = "block";

    var fecha=moment().format('YYYY-MM-DD');
	var hora=moment().format('HH:mm:ss');
	var fecha_hora=fecha+" "+hora;

    $.post("ajax/index.php?op=listar_movimientos_cat&idcategoria="+idcategoria+"&fecha="+fecha,function(r){
    $("#lineas").html(r);
                     
    });
}

function regresar(){
    $("#box_categorias").show();
    $("#idcategoria").val("");
    $("#nom_categoria").text("");
    $("#suma_cat").text("");
    document.getElementById("div_datos_cat").style.display = "none";
    listar_movimientos();
    document.getElementById("box_pagosrapidos").style.display="block";
}

function listar_pagos_rapidos(){

        $.post("ajax/index.php?op=listar_pagos_rapidos_3",function(r){
        $("#pagos_rapidos_3").html(r);
                         
        });

        $.post("ajax/index.php?op=listar_pagos_rapidos_1",function(r){
        $("#pagos_rapidos_1").html(r);
                             
        });
        $.post("ajax/index.php?op=listar_pagos_rapidos_2",function(r){
        $("#pagos_rapidos_2").html(r);
                                 
        });
}

function select_pago_rapido(idpago_rapido,concepto,idcategoria,monto,idpago_rel,estatus){

    console.log(idcategoria+" idcategoria "+concepto+" concepto "+monto+" monto ");

    idpago_rapido_1 = idpago_rapido;
    concepto_1 = concepto;
    idcategoria_1 = idcategoria;
    monto_1 = monto;   
    idpago_rel_1 = idpago_rel;
    estatus_1 = estatus;
    $("#idcategoria").val(idcategoria);
    $("#concepto").val(concepto);
    $("#monto").val(monto);
    $("#box_categorias").hide();
    document.getElementById("div_datos_cat").style.display = "block";
    var fecha=moment().format('YYYY-MM-DD');
	var hora=moment().format('HH:mm:ss');
	var fecha_hora=fecha+" "+hora;

    $.post("ajax/index.php?op=listar_movimientos_cat&idcategoria="+idcategoria_1+"&fecha="+fecha,function(r){
    $("#lineas").html(r);

        document.getElementById("box_pagosrapidos").style.display="none";
                     
    });
}

init();