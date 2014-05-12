<!DOCTYPE HTML>
<title>MTAC 2013</title>
<meta charset="utf-8" />

<link rel="stylesheet" type="text/css" href="styles/elegant-press.css" />
<link rel="stylesheet" type="text/css" href="menu/menu.css" media="screen" />
<script type="text/javascript" src="menu/jquery.js"></script>
<style>
     svg {
               background: none !important;
     }
</style>
<!--<link type="text/css" href="menu.css" rel="stylesheet" />
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="menu.js"></script>-->


	<script type="text/javascript" src="scripts/elegant-press.js"></script>
	<script type="text/javascript" src="scripts/cross-slide.min.js"></script>
    <script type="text/javascript" src="scripts/cross-slide-config.js"></script>
    <script type="text/javascript" src="scripts/jquery.badBrowser.js"></script> 
	<script type="text/javascript" src="menu/menu.js"></script>
    <script type="text/javascript" src="scripts/jquery.dotdotdot.js"></script>
	
	
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




        


</head>
<body>
<div class="main-container">
  <?php include('includes/header.php'); ?>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var url = window.location.pathname;
        var basename = url.substring(url.lastIndexOf('/') + 1);
        $("ul.menu > li").each(function(){
            if( $(this).find("a[href='" + basename + "']").length ){
                $(this).addClass("current");
            }
        });
    });
</script>

<?php include('includes/menu.php'); ?>

<div class="main-container">
            <div class="container1">

                <article class="box">
                
                    <div class="multicolumn">
                        <div class="col1">
                            <h4>MTAC 2012</h4>

                            <p>The <strong>First edition</strong> of this conference will be held at the
                                <a href="http://www.iitb.ac.in"><strong>Goa College
								of Engineering
                                Goa</strong></a> from <strong>14 to
                                15 May, 2013</strong>.  The
                                objective of this conference is to
                                serve as a platform to bring together
                                researchers to present original ideas
                                and solutions, discuss new problems,
                                and share information on
                                state-of-the-art technologies in
                                anything related to advanced computing
                                </p>
                                <p>
                                Check out information about <a href="about-gec.php">the venue &mdash; GEC Goa</a>
                                and about <a href="about-goa.php"> the host city &mdash; Goa</a>.
                            </p>
							 <h4>Latest Updates</h4>
                            
							 
							 <div id="news-list-short" class="news-list">       
							<?php include('update.php'); ?>
							
							 
                    <br/><p class="center"><a href="updates/news-list.php?all=true&iframe=true&width=60%&height=100%" data-gal="prettyPhoto[news]" title="All Updates">Older Updates</a></p></div>    

    <script type="text/javascript">
    $(document).ready(function() {
        $("#news-list-full.news-list a, #news-list-short.news-list a").attr("target", "_blank"); // Do this only if different domain :)
    });
    </script>

							</div>

<div class="col2">
                            <h4>Important Dates</h4>
                            <p>
                                <table align="center">
    <tr>
        <td class="key nowrap">Pre-Submissions Abstract <br> (Recommended)</td>
        <td class="value"> <strong>Jul 31, 2012 </strong></td>
    </tr>
    <tr>
        <td class="key nowrap">Paper submissions due <br> <strong> (No
    extensions) </strong></td>
        <td class="value">Aug 7, 2012, 23:59 GMT </td>
    </tr>
    <tr>
        <td class="key nowrap">Author Rebuttal Period</td>
        <td class="value">Sep 17, 2012, 17:00 GMT to Sep 19, 2012, 12:00 (noon) GMT</td>
    </tr>
    <tr>
        <td class="key nowrap">Decision notification</td>
        <td class="value"><s> Sep 30, 2012</s><br/>  Delayed to Oct 3, 2012.</td>
    </tr>
    <tr>
        <td class="key nowrap">Camera ready papers due</td>
        <td class="value">Oct 31, 2012, 23:59 GMT</td>
    </tr>
</table>

                            </p>
			    
			    <h4>Questions?</h4>
                            <p>
                                Please check out the <a href="faq.php">FAQs</a> page to get solutions to most 
                                common questions. If that does not help, or for any further enquiries please 
                                <!--feel free to --> drop an email to <a href="http://www.google.com/recaptcha/mailhide/d?k=01SHALP58mtnSOzjpAcX6Qlw==&c=I7HbgbNxZnW661iY4jPOIf7OXoaHiriD8DRFdszl330=">admin@mtac13.org</a>.
                            </p>
                        </div>
                    </div>
                    
         
                
 </article>
                <p><br class="clear"/></p>

          

 
 <br class="clear"/>
 
 <article class="box" id="home_featured21">
      <div class="block"><h2>Who Are We</h2>
        <p>Aliquatjusto quisque nam consequat doloreet vest orna partur scetur portortis nam. Metadipiscing eget facilis elit sagittis felisi eger id justo maurisus convallicitur. Dapiensociis temper donec auctortortis cumsan et curabitur condis lorem loborttis leo. Ipsumcommodo libero nunc at in velis tincidunt pellentum tincidunt vel lorem.<br />
<a href="#" class="read_more">Read More</a> 
</p>
      </div>
      <div class="block"><h2>Compatibility</h2>
        <ul id="list">
        <li>Dapiensociis temper donec auctortortis cumsan et curabitur.</li>
        <li>Condis lorem loborttis leo.</li>
        <li>Portortornec condimenterdum eget consectetuer condis.</li>
        <li>Puruselit mauris nulla hendimentesque elit semper nam a sapien urna sempus.</li>
        </ul>
<br />
<br />
      <img src="images/browsers.png" alt="Web Browsers"/>

      </div>
      <div class="block last"><h2>What We Do</h2>
        <p>Temperinte interdum sempus odio urna eget curabitur semper convallis nunc laoreet. Nullain convallis ris elis vest liberos nis diculis feugiat in rutrum. Suspendreristibulumfaucibulum lobortor quis tortortor ris sapien sce enim et volutpat sus. Urnaretiumorci orci fauctor leo justo nulla cras ridiculum eu id vitae. <br />
<a href="#" class="read_more">Read More</a></p>
      </div>
     
   
<p><br class="clear"/></p>

            
 </article>
            <br class="clear"/>
  </div>
<div class="calloutcontainer">
<?php include('includes/footer.php'); ?>


</div>
        </div>

    </body>
</html>
