
  google.load("visualization", "1", { packages: ["corechart"] });
  google.setOnLoadCallback(drawChart);


function drawChart() {

                var jsonData = $.ajax({
                    type: "GET",
                    url: "../../vistas/panel_admin/datosDeTabla.php",
                    data: "valor",
                    dataType: "json",
                    async: false
                }).responseText;
  
                var obj = jQuery.parseJSON(jsonData);
                var data = google.visualization.arrayToDataTable(obj);

                var options = {

        pointSize: 2,

                legend: {position: 'right', textStyle: {fontSize: 9, fontName: 'verdana', color: '595959'}},

                title: ('Venta de productos'),
      
        titleTextStyle: { color: '595959',   fontName: 'verdana', fontSize: 11  },
<!-- Eje y  si no quieres % quita la opcion format: '#\'%\''-->           
                vAxis: {minValue: 0, maxValue: 100, format: '#\'%\'',minorGridlines: {count: 0}, textStyle: {fontName: 'verdana', color: '595959'}},
<!-- Eje X  si no quieres las etiquetas con angulo 90° pon  slantedText:false -->           
        hAxis: {direction:1, slantedText:true, slantedTextAngle: 90, textStyle: {fontName: 'verdana', color: '595959'}} 
                };
<!-- Especificamos el tipo de grafico puedes probar los tipos de graficos comentados abajo (ya que el formato de array es el mismo) Pie, Column  y muchos mas en https://developers.google.com/chart/interactive/docs/gallery?hl=es  -->   
                var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
    <!--    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));-->  
    
    <!--    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));-->

                chart.draw(data, options);
            }

  $("#periodo").change(function(){
    var valor = $(this).val();

    drawChart(data, options,valor);//invoco la funcion
    });

