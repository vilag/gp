function init()
{
    listar_categorias();
    listar_categorias_box();
    suma_gastos();
    listar_movimientos();
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
    var categoria = $("#idcategoria").val();
    var concepto = $("#concepto").val();
    var monto = $("#monto").val();

    // alert(categoria);
    // alert(concepto);
    // alert(monto);

    var fecha=moment().format('YYYY-MM-DD');
	var hora=moment().format('HH:mm:ss');
	var fecha_hora=fecha+" "+hora;

    if (categoria>0 && concepto!="" && monto>0) {
        $.post("ajax/index.php?op=guardar",{categoria:categoria,concepto:concepto,monto:monto,fecha_hora:fecha_hora},function(data, status)
		{
			data = JSON.parse(data);

            alert("Guardado exitosamente");
            $("#select_categorias").val("");
            $("#concepto").val("");
            $("#monto").val("");
            $("#idcategoria").val("");
            $("#box_categorias").show();

            listar_movimientos();
            suma_gastos();
            listar_categorias_box();
			
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
			
		});
}

function select_cat(idcategoria,nombre,suma){
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
}

function listar_pagos_rapidos(){

        $.post("ajax/index.php?op=listar_pagos_rapidos",function(r){
        $("#pagos_rapidos").html(r);
                         
        });
}

init();