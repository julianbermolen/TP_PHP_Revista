
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  var valor;//almacena el valor del select cuando este cambie de opcion
  var tipo;
function drawChart() {

                var jsonData = $.ajax({
                    type: "GET",
                    url: "../../vistas/panel_admin/datosDeTabla.php?valor="+valor+"&tipo="+tipo,
                    dataType: "json",
                    async: false
                }).responseText;
  
                var obj = jQuery.parseJSON(jsonData);
                var data = google.visualization.arrayToDataTable(obj);
                //hasta este punto el codigo es igual para todos los graficos
                var options = {
                legend: {position: 'right', textStyle: {fontSize: 12, fontName: 'verdana', color: '595959'}},

<!-- Eje y  si no quieres % quita la opcion format: '#\'%\''-->           
                vAxis: {minValue: 0, maxValue: 100, format: '#\'%\'',minorGridlines: {count: 0}, textStyle: {fontName: 'verdana', color: '595959'}},
<!-- Eje X  si no quieres las etiquetas con angulo 90° pon  slantedText:false -->           
        hAxis: {direction:1, slantedText:true, slantedTextAngle: 90, textStyle: {fontName: 'verdana', color: '595959'}} 
                };
                switch(tipo){
                case "productos":var chart = new google.visualization.PieChart(document.getElementById('pie-chart-div'));
                  break;

                case "suscripciones":var chart = new google.visualization.BarChart(document.getElementById('bar-chart-div'));
                  break;
                }
               // var table = new google.visualization.Table(document.getElementById('chart-table-div'));
                
                chart.draw(data, options);

               // table.draw(data, options);
             
  }          

$(function(){
    $("#periodo-ventas").change(function(){
      valor = $(this).val();//obtengo el valor del select
      tipo = "productos";//indico que es lo que voy a graficar
      drawChart();//invoco la funcion
    });

    $("#periodo-suscripciones").change(function(){
      valor = $(this).val();//obtengo el valor del select
      tipo = "suscripciones";
      drawChart();//invoco la funcion
    });
});