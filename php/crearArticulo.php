<!DOCTYPE html>
<html lang="es">
<head>
	<title>Editorial InfoNete</title>
		      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
          <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
          <script src="../js/jquery-1.12.3.js"></script>
          <script src="http://code.jquery.com/jquery.js"></script>
          <link rel="stylesheet" href="../css/bootstrap-3.3.6-dist/css/bootstrap.css">
          <link rel="stylesheet" href="../css/estiloTP.css">
          <link rel="shortcut icon" href="../imagenes/icono-suscripciones.png" type="image/png"/>
          <script src="css/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
          <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:400,900' rel='stylesheet' type='text/css'>
 <?php include("funciones.php"); ?>

  <link rel="stylesheet" href="../js/CLEditor1_4_5/jquery.cleditor.css" />
  <script src="../js/CLEditor1_4_5/jquery.cleditor.min.js"></script>
  <script>
        $(document).ready(function() {
            $("#input").cleditor({
                width: 1000, // width not including margins, borders or padding
                height: 250, // height not including margins, borders or padding
                controls: // controls to add to the toolbar
                    "bold italic underline strikethrough subscript superscript | font size " +
                    "style | color highlight removeformat | bullets numbering | outdent " +
                    "indent | alignleft center alignright justify | undo redo | " +
                    "rule image link unlink | cut copy paste pastetext | print source",
                colors: // colors in the color popup
                    "FFF FCC FC9 FF9 FFC 9F9 9FF CFF CCF FCF " +
                    "CCC F66 F96 FF6 FF3 6F9 3FF 6FF 99F F9F " +
                    "BBB F00 F90 FC6 FF0 3F3 6CC 3CF 66C C6C " +
                    "999 C00 F60 FC3 FC0 3C0 0CC 36F 63F C3C " +
                    "666 900 C60 C93 990 090 399 33F 60C 939 " +
                    "333 600 930 963 660 060 366 009 339 636 " +
                    "000 300 630 633 330 030 033 006 309 303",
                fonts: // font names in the font popup
                    "Arial,Arial Black,Comic Sans MS,Courier New,Narrow,Garamond," +
                    "Georgia,Impact,Sans Serif,Serif,Tahoma,Trebuchet MS,Verdana",
                sizes: // sizes in the font size popup
                    "1,2,3,4,5,6,7",
                styles: // styles in the style popup
                    [["Paragraph", "<p>"], ["Header 1", "<h1>"], ["Header 2", "<h2>"],
                    ["Header 3", "<h3>"],  ["Header 4","<h4>"],  ["Header 5","<h5>"],
                    ["Header 6","<h6>"]],
                useCSS: false, // use CSS to style HTML when possible (not supported in ie)
                docType: // Document type contained within the editor
                    '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">',
                docCSSFile: // CSS file used to style the document contained within the editor
                    "",
                bodyStyle: // style to assign to document body contained within the editor
                    "margin:4px; font:10pt Arial,Verdana; cursor:text"
            });
        });
    </script>
</head>
<body>
   <div class="container"><!--contenedor de menu-->
	<?php include("menu.php"); ?>
    </div>
      <section id="contenedorDeRevistas">
        <div class="container">
            
            <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Agregue un titulo"/><br>
            
            <input type="text" id="subtitulo" name="subtitulo" class="form-control" placeholder="Agregue un subtitulo"/><br><br>
            <textarea id="input" name="input"></textarea>
        </div>
      </section>
  <?php include("footer.php"); ?>
</body>
</html>