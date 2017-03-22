<?php require_once('Connections/Base.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
    {
      $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

      $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

      switch ($theType) {
        case "text":
          $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
          break;
        case "long":
        case "int":
          $theValue = ($theValue != "") ? intval($theValue) : "NULL";
          break;
        case "double":
          $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
          break;
        case "date":
          $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
          break;
        case "defined":
          $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
          break;
      }
      return $theValue;
    }
}
//obten Project
$a = "-1";
if (isset($_GET['Academia'])) {
  $a = $_GET['Academia'];
}

//Info Projects
mysql_select_db($database_Base, $Base);
$query =  sprintf("SELECT * FROM academia where identif=%s",GetSQLValueString($a, "text"));
$academia = mysql_query($query, $Base) or die(mysql_error());
$row_academia = mysql_fetch_assoc($academia);

//Info fotos
mysql_select_db($database_Base, $Base);
$query_fotos =  sprintf("SELECT * FROM academiap where Academia=%s order by Photo ASC",GetSQLValueString($a, "text"));
$fotos = mysql_query($query_fotos, $Base) or die(mysql_error());
$row_fotos = mysql_fetch_assoc($fotos);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/1999/REC-html401-19991224">
<html>
	<head>
                <title><?php echo $row_academia['Academia']; ?></title>
                <meta http-equiv="Content-type" content="text/html; charset=utf-8">

                <meta name="title" content="Dear Architects/ <?php echo $row_academia['Academia']; ?>" />
		
                <script type="text/javascript" src="analitics.js"></script>
                <link rel="shortcut icon" href="da_ico.ico" type="image/x-icon"/>
                <link rel="icon" href="da_ico.ico" type="image/x-icon" />

                <link rel="stylesheet" href="CSS.css" type="text/css" />
<!--Menu-->
<link rel="stylesheet" href="Menu3Niv/nav-v.css" type="text/css" media="screen" />
<!--[if gte IE 5.5]><script language="JavaScript" src="jquery.ienav.js" type="text/javascript"></script><![endif]-->
                
		<link rel="stylesheet" href="SLIDER/css/basic.css" type="text/css" />
		<link rel="stylesheet" href="SLIDER/css/slider.css" type="text/css" />
		<link rel="stylesheet" href="SLIDER/css/white.css" type="text/css" />

		<script type="text/javascript" src="SLIDER/js/jquery-1.3.2.js"></script>
		<script type="text/javascript" src="SLIDER/js/jquery.history.js"></script>
		<script type="text/javascript" src="SLIDER/js/jquery.galleriffic.js"></script>
		<script type="text/javascript" src="SLIDER/js/jquery.opacityrollover.js"></script>
                <script type="text/javascript">
                $(document).ready(function(){
                document.getElementById("academiat").style.color="black";
                });
                </script>
		<!-- We only want the thunbnails to display when javascript is disabled -->
		<script type="text/javascript">
			document.write('<style>.noscript { display: none; }</style>');
		</script>

                                <!--social-->
                <script type="text/javascript">
                function tweet(t)
                {
                    var text = t;
                    var todo= "http://twitter.com/share?text="+text+"&via=dear_architects";
                    window.open(todo,"newWindow", "width=500,height=300,screenX=50,left=390,screenY=50,top=100");
                }
                function face()
                {
                    var url = document.URL;
                    var todo= "http://www.facebook.com/sharer.php?u="+url;
                    window.open(todo,"newWindow", "width=650,height=320,screenX=50,left=300,screenY=50,top=100");
                }
                </script>
	</head>
	<body>
<div id="wrapper">
    <div id="leftcolumn">
        <?php include("Menu3Niv/index.php"); ?>

        <div id="info">
            <div><span class="t">University</span><span><?php echo $row_academia['University']; ?></span></div>
            <div><span class="t">Term</span><span><?php echo $row_academia['Term']; ?></span></div>
            <div><span class="t">Degree</span><span><?php echo $row_academia['Degree']; ?></span></div>
            <div><span class="t">Professor(s)</span><span><?php echo $row_academia['Professors']; ?></span></div>
        </div>
        <div id="detalles">
            <?php echo $row_academia['Description']; ?>
        </div>

     </div>
     <div id="cuadrado">
          <div id="social">
            <span>
              <img onclick="tweet('<?php echo $row_academia['Academia']; ?>')" style="cursor:pointer;" src="Twitter.jpg" title="Share on Twitter"/>
            </span>
            <span>
              <img onclick="face()" style="cursor:pointer;" src="Facebook.jpg" title="Share on Facebook"/>
            </span>
        </div>
                <div id="titulop">
                    <?php echo $row_academia['Academia']; ?>
                </div>
				<!-- Start Advanced Gallery Html Containers -->
				<div class="navigation-container">
					<div id="thumbs" class="navigation">
						<a class="pageLink prev" style="visibility: hidden;" href="#" title="Previous Page"></a>
						<ul class="thumbs noscript">
                                                    <?php
                                                        do {$nombre=$row_fotos['Photo'];
                                                        if($nombre != NULL){
                                                     ?>
							<li>
								<a class="thumb"  href="admin/academiap/grande/<?php echo $nombre;?>">
									<img src="admin/academiap/chico/<?php echo $nombre;?>" alt=""/>
								</a>

							</li>
                                                      <?php } } while ($row_fotos = mysql_fetch_assoc($fotos)); ?>
						</ul>
						<a class="pageLink next" style="visibility: hidden;" href="#" title="Next Page"></a>
					</div>
				</div>
				<div class="content">
					<div class="slideshow-container">
						<div id="controls" class="controls"></div>
                                                <div id="caption" class="caption-container"><div class="photo-index"></div></div>
						<div id="loading" class="loader"></div>
						<div id="slideshow" class="slideshow"></div>
					</div>

				</div>
				<!-- End Gallery Html Containers -->
				<div style="clear: both;"></div>
              </div>
  </div>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				// We only want these styles applied when javascript is enabled
				$('div.content').css('display', 'block');

				// Initially set opacity on thumbs and add
				// additional styling for hover effect on thumbs
				var onMouseOutOpacity = 0.60;
				$('#thumbs ul.thumbs li, div.navigation a.pageLink').opacityrollover({
					mouseOutOpacity:   onMouseOutOpacity,
					mouseOverOpacity:  1.0,
					fadeSpeed:         'fast',
					exemptionSelector: '.selected'
				});

				// Initialize Advanced Galleriffic Gallery
				var gallery = $('#thumbs').galleriffic({
					delay:                     2500,
					numThumbs:                 10,
					preloadAhead:              10,
					enableTopPager:            false,
					enableBottomPager:         false,
					imageContainerSel:         '#slideshow',
					controlsContainerSel:      '#controls',
					captionContainerSel:       '#caption',
					loadingContainerSel:       '#loading',
					renderSSControls:          true,
					renderNavControls:         true,
					playLinkText:              'Play',
					pauseLinkText:             'Pause',
					prevLinkText:              'Prev',
					nextLinkText:              'Next',
					nextPageLinkText:          'Next',
					prevPageLinkText:          'Prev',
					enableHistory:             true,
					autoStart:                 false,
					syncTransitions:           true,
					defaultTransitionDuration: 900,
					onSlideChange:             function(prevIndex, nextIndex) {
						// 'this' refers to the gallery, which is an extension of $('#thumbs')
						this.find('ul.thumbs').children()
							.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
							.eq(nextIndex).fadeTo('fast', 1.0);

						// Update the photo index display
						this.$captionContainer.find('div.photo-index')
							.html((nextIndex+1) +' of '+ this.data.length);
					},
					onPageTransitionOut:       function(callback) {
						this.fadeTo('fast', 0.0, callback);
					},
					onPageTransitionIn:        function() {
						var prevPageLink = this.find('a.prev').css('visibility', 'hidden');
						var nextPageLink = this.find('a.next').css('visibility', 'hidden');

						// Show appropriate next / prev page links
						if (this.displayedPage > 0)
							prevPageLink.css('visibility', 'visible');

						var lastPage = this.getNumPages() - 1;
						if (this.displayedPage < lastPage)
							nextPageLink.css('visibility', 'visible');

						this.fadeTo('fast', 1.0);
					}
				});

				/**************** Event handlers for custom next / prev page links **********************/

				gallery.find('a.prev').click(function(e) {
					gallery.previousPage();
					e.preventDefault();
				});

				gallery.find('a.next').click(function(e) {
					gallery.nextPage();
					e.preventDefault();
				});

				/****************************************************************************************/

				/**** Functions to support integration of galleriffic with the jquery.history plugin ****/

				// PageLoad function
				// This function is called when:
				// 1. after calling $.historyInit();
				// 2. after calling $.historyLoad();
				// 3. after pushing "Go Back" button of a browser
				function pageload(hash) {
					// alert("pageload: " + hash);
					// hash doesn't contain the first # character.
					if(hash) {
						$.galleriffic.gotoImage(hash);
					} else {
						gallery.gotoIndex(0);
					}
				}

				// Initialize history plugin.
				// The callback is called at once by present location.hash.
				$.historyInit(pageload, "advanced.html");

				// set onlick event for buttons using the jQuery 1.3 live method
				$("a[rel='history']").live('click', function(e) {
					if (e.button != 0) return true;

					var hash = this.href;
					hash = hash.replace(/^.*#/, '');

					// moves to a new page.
					// pageload is called at once.
					// hash don't contain "#", "?"
					$.historyLoad(hash);

					return false;
				});

				/****************************************************************************************/
			});
		</script>
	</body>
</html>