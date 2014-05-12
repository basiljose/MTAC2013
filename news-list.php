
<!DOCTYPE html>
<html>
    <head>
        <title>ICVGIP 2012</title>
        
<meta charset="utf-8" />

<link rel="stylesheet" type="text/css" href="http://www.cse.iitb.ac.in/graphics/icvgip2012/styles/elegant-press.css" />
<link rel="stylesheet" type="text/css" href="http://www.cse.iitb.ac.in/graphics/icvgip2012/menu/menu.css" media="screen" />

<script type="text/javascript" src="http://www.cse.iitb.ac.in/graphics/icvgip2012/scripts/elegant-press.js"></script>
    <script type="text/javascript" src="http://www.cse.iitb.ac.in/graphics/icvgip2012/scripts/cross-slide.min.js"></script>
    <script type="text/javascript" src="http://www.cse.iitb.ac.in/graphics/icvgip2012/scripts/cross-slide-config.js"></script>
    <script type="text/javascript" src="http://www.cse.iitb.ac.in/graphics/icvgip2012/scripts/jquery.badBrowser.js"></script> 
    <script type="text/javascript" src="http://www.cse.iitb.ac.in/graphics/icvgip2012/scripts/jquery.dotdotdot.js"></script>

<!--[if IE]><style>#header h1 a:hover{font-size:75px;}</style><![endif]-->

<script type="text/javascript">
    $(document).ready(function() {
        $(".person").wrapInner("<div class='pos-inner'></div>").wrapInner("<div class='pos-outer'></div>");
        $(".address .website").each(function(index, element) {
            $(this).wrap('<a href="' + $(element).text() + '" target="_blank"></a>');
        });

        //$("#news-list").sortable().disableSelection();

        $("table.news-list td.edit_td").live("click", function() { // Using old jQuery -- Use on() instead of live() in new version!
            var ID=$(this).closest("tr.edit_tr").attr('id');
            console.log("id=" + ID);
            $("#date_"+ID).hide();
            $("#content_"+ID).hide();
            $("#date_input_"+ID).show();
            $("#content_input_"+ID).show();
        });
        
        // Edit input box click action
        $("table.news-list input.editbox").live("mouseup", function() { // Using old jQuery -- Use on() instead of live() in new version!
            return false;
        });

        // Outside click action
        $(document).mouseup(function() {
            $("table.news-list td.edit_td").each(function() {
                $(this).children(".text + input.editbox:visible").each(function() {
                    $(this).prev().html($(this).val()); // NOote: html() is used! Use text() if any problems!
                });
            });
            $("table.news-list input.editbox").hide();
            $("table.news-list .text").show();
        });

        // REF: http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/documentation/
        // Change default prettyPhoto options
        // REF: http://amburiroy.wordpress.com/2012/03/06/remove-annoying-prettyphoto0-string-from-url/
        // Modified "deeplinking:true" to "deeplinking:false" in elegant-press.js
    });

    /* REF: http://demo.petiar.sk/smartfloat/ */
    // This is a demo of a simple jQuery script which allows you to have floated elements
    // which various height in variable width design. Try it by changing the width of your browser's window.
    //
    // This script has been written by petiar and you can use it freely as you wish.
    // However, it would be nice if you did not remove following line. Thanks! :-)
    // (c) http://petiar.sk - jQuery, Drupal, CodeIgniter

    $(window).load(function () {

        calc();

        $(window).resize(function() {
	        calc();
        })

        function calc() {
	
	        var row = 0;
	        var rowheight = 0;
	        var elements = new Array();
	
	        // .item is the base class - it identifies elements we are going to align
	        $('.multicolumn4 > .item').each(function(index, element) {
		        var height = $(this).height();
		        var p = $(this).position();
		        var top = p.top;

		        if (top != row) {
			        setHeight(elements, rowheight);
			        // we need to set the position one more time because the object could have been
			        // moved after setting height to previous ones
			        var p = $(this).position();
			        var top = p.top;
			
			        row = top;
			        elements.length = 0;
			        rowheight = 0;
		        }
		
		        elements.push($(this));
		        if (height > rowheight) {
			        rowheight = height;
		        }

	        });
	        if (elements.length > 0) {
		        setHeight(elements, rowheight);
	        }
        }

        function setHeight(elements, height) {
	        $.each(elements, function(key, value) {
		        $(this).css('height', height);
	        })
        }
    })        
</script>

<style type="text/css" >
        /* MUST explicitely specify ID for elements -- otherwise interfere when loaded/included in other page */
        #body {
            background: white;
            max-width: 800px;
            margin: auto;
        }
        table#news-list-full { width: 100%; table-layout: fixed; }
        table#news-list-full thead td, table#news-list-full tbody td { padding:5px; vertical-align:middle; }
        table#news-list-full thead {
            background-color:#333;
            color:#FFFFFF
        }
        table#news-list-full thead th, table#news-list-full tbody th {
            font-weight:bold;
            text-align:left;
            padding:4px;
            text-align:center;
        }
        </style>
		
		

 </head>

    <body id="body">
<?php include_once("analyticstracking.php") ?>
<?php
$file = fopen("record.txt", "r");
 
$i = 0;
while (!feof($file)) {
    $line_of_text .= fgets($file);
}
$members = explode("\n", $line_of_text);
fclose($file);
            
        echo"<table id='news-list-full' class='news-list'>
            <col width='25%' />
            <col width='75%' />
        
            <thead>
                <tr>
                    <th>Date</th><th>Content</th>
                </tr>
            </thead>
            
            <tbody>";
			while ($members[$i]!=null) {
    if ($i == 0) {
        $i++;
        continue;
    } else {
       // echo $i;
        $members[$i] = explode("`", "" . $members[$i]);
       // echo $members[$i][0];
       
		
		
		 echo"     <tr>
                                <td class='center'>
                                    <span class='text' style='display:inline;'>".$members[$i][0]."</span>
                                </td>
                                <td>
                                    <span class='text' style='display:inline;'><strong>".$members[$i][1]." <a href='important-dates.php'></a>.</strong></span> 
                                </td>
                            </tr>";


        $i++;
    }
}
			
                                      
       $count=$i-1;                          
                 
                                                                        
                                                            
          echo"  </tbody>
            
            <tfoot>
                <tr>
                    <td colspan='2' class='center'>Total ".$count." updates found.</td>
                </tr>
            </tfoot>
        </table>";

         ?>    
		  <script type="text/javascript">
    $(document).ready(function() {
        $("#news-list-full.news-list a, #news-list-short.news-list a").attr("target", "_blank"); // Do this only if different domain :)
    });
    </script>


    </body>
</html>


  


