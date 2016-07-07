
  google.load("visualization", "1", { packages: ["corechart"] });
  google.setOnLoadCallback(drawChart);
  var valor;//almacena el valor del select cuando este cambie de opcion

function drawChart() {

                var jsonData = $.ajax({
                    type: "GET",
                    url: "../../vistas/panel_admin/datosDeTabla.php?valor="+valor,
                    dataType: "json",
                    async: false
                }).responseText;
  
                var obj = jQuery.parseJSON(jsonData);
                var data = google.visualization.arrayToDataTable(obj);

                var options = {

                pointSize: 2,

                legend: {position: 'right', textStyle: {fontSize: 12, fontName: 'verdana', color: '595959'}},

                title: ('Venta de productos'),
      
        titleTextStyle: { color: '595959',   fontName: 'verdana', fontSize: 12  },
    
                vAxis: {minValue: 0, maxValue: 100, format: '#\'%\'',minorGridlines: {count: 0}, textStyle: {fontName: 'verdana', color: '595959'}},

        hAxis: {direction:1, slantedText:true, slantedTextAngle: 90, textStyle: {fontName: 'verdana', color: '595959'}} 
                };
var chart = new google.visualization.PieChart(document.getElementById('chart-div'));

var table = new google.visualization.Table(document.getElementById('chart-table-div'));
                
                chart.draw(data, options);

                table.draw(data, options);
  }          

$(function(){
    $("#periodo").change(function(){
      valor=$(this).val();//obtengo el valor del select
      drawChart();//invoco la funcion
  });
});