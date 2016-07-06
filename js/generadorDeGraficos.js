$(document).ready(function(){
      google.charts.load('current',{'packages':['corechart','table']});
      google.charts.setOnLoadCallback(loadData);


      $("#periodo").change(function(){
        var valor = $(this).val();
        
        function loadData(valor){
          $.ajax({
            type: 'GET',
            url: '../vistas/panel_admin/datosDeTabla.php',
            data: valor,
            dataType: 'json',
            succes: drawChart
          });

        }

      });

      function drawChart(jsonData) {

        // Create the data table.
        var pieData = new google.visualization.arrayToDataTable(jsonData);
        // Set chart options

        var pieChartOptions = {'title':'Venta de productos',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart-div'));
        chart.draw(pieData, pieChartOptions);

        var tableOptions = {'showRowNumber':'true',
                       'width':'60%'};

        // Instantiate and draw our chart, passing in some options.
        var table = new google.visualization.Table(document.getElementById('chart-table-div'));
        table.draw(pieData, tableOptions);
      }

});