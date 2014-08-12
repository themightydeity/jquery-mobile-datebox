<?php

$defaults = array(
	// Common Options
	'mWidth' 		=> array(280, "Widget Width", 'common', 100, 700),
	
	// CalBox Options
	'cGDWidth' 		=> array(36, "Date Width", 'calbox',5 ,100),
	'cGDHeight'		=> array(30, "Date Height", 'calbox', 5, 100),
	'cGDLHeight'	=> array(30, "Date Line Height", 'calbox', 5, 50),
	'cGDFont'		=> array(12, "Date Font Size", 'calbox', 5, 50),
	'cGDWWidth'		=> array(31, "Week # Width", 'calbox', 5, 100),
	'cGDEColor'		=> array("#888888", "Non-Month Day Color", 'calbox', false),
	
	// FlipBox Options
	'fLensWidth'	=> array(260, "Lens Width", 'flipbox', 100, 700),
	'fLensHeight'	=> array(40, "Lens Height", 'flipbox', 5, 100),
	'fTotHeight'	=> array(125, "Scroll Box Height", 'flipbox', 50, 350),
	'fScrHeight'	=> array(120, "Scroller Height", 'flipbox', 50, 350),
	'fScrWidth'		=> array(77, "Scroller Width", 'flipbox', 5, 200),
	'fDScrWidth'	=> array(60, "Scroller Width (Dur)", 'flipbox', 5, 200),
	'fEleHeight'	=> array(30, "Date Height", 'flipbox', 5, 50),
	
	// SlideBox Options
	'sYWidth'		=> array(84, "Year Width", 'slidebox', 5, 150),
	'sMWidth'		=> array(51, "Month Width", 'slidebox', 5, 150),
	'sDWidth'		=> array(32, "Date Width", 'slidebox', 5, 150),
	'sHWidth'		=> array(32, "Hour Width", 'slidebox', 5, 150),
	'sIWidth'		=> array(32, "Minute Width", 'slidebox', 5, 150),
	
	'sYMHigh'		=> array(30, "Year/Month Height", 'slidebox', 5, 50),
	'sDHigh'		=> array(38, "Date Height", 'slidebox', 5, 50),
	'sHIHigh'		=> array(24, "Hour/Min Height", 'slidebox', 5, 50),
	
	'sYMLHigh'		=> array(30, "Year/Month Line Height", 'slidebox', 5, 50),
	'sDLHigh'		=> array(20, "Date Line Height", 'slidebox', 5, 50),
	'sHILHigh'		=> array(22, "Hour/Min Line Height", 'slidebox', 5, 50),
	
	'sYFont'		=> array(14, "Year Font Size", 'slidebox', 5, 50),
	'sMFont'		=> array(12, "Month Font Size", 'slidebox', 5, 50),
	'sDFont'		=> array(14, "Date Font Size", 'slidebox', 5, 50),
	'sHFont'		=> array(14, "Hour Font Size", 'slidebox', 5, 50),
	'sIFont'		=> array(14, "Minute Font Size", 'slidebox', 5, 50),
	'sSubFont'		=> array(10, "Subtitle Font Size", 'slidebox', 5, 50)
);

$use = array();

foreach ( $defaults as $key => $value ) {
	if ( isset($_REQUEST[$key]) ) {
		$use[$key] = $_REQUEST[$key];
	} else {
		$use[$key] = $value[0];
	}
}
?>
<!DOCTYPE html> 
<html lang="en"> 
<head> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>jQueryMobile - DateBox Themeing</title>
	
	<!-- NOTE: Script load order is significant! -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.1.js"></script> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.3/jquery.mobile-1.4.3.min.css" />
	
	
	<?php if ( !empty($_SERVER['QUERY_STRING']) ) {
		echo '<link type="text/css" href="sheet.php?'.$_SERVER['QUERY_STRING'].'" rel="stylesheet" />'."\n";
	} else {
		echo '<link type="text/css" href="sheet.php" rel="stylesheet" />'."\n";
	} ?>
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.1.min.js"></script> 
	<script src="http://code.jquery.com/mobile/1.4.3/jquery.mobile-1.4.3.min.js"></script>
	<script type="text/javascript" src="http://cdn.jtsage.com/external/jquery.mousewheel.min.js"></script>
	<script type="text/javascript" src="http://cdn.jtsage.com/datebox/dev/jqm-datebox.core.js"></script>
	<script type="text/javascript" src="http://cdn.jtsage.com/datebox/dev/jqm-datebox.mode.calbox.js"></script>
	<script type="text/javascript" src="http://cdn.jtsage.com/datebox/dev/jqm-datebox.mode.datebox.js"></script>
	<script type="text/javascript" src="http://cdn.jtsage.com/datebox/dev/jqm-datebox.mode.flipbox.js"></script>
	<script type="text/javascript" src="http://cdn.jtsage.com/datebox/dev/jqm-datebox.mode.durationbox.js"></script>
	<script type="text/javascript" src="http://cdn.jtsage.com/datebox/dev/jqm-datebox.mode.slidebox.js"></script>
	<script type="text/javascript" src="http://cdn.jtsage.com/datebox/i18n/jquery.mobile.datebox.i18n.en_US.utf8.js"></script>
	
	<script type="text/javascript">
		$(document).ready( function() {
			$('.applysheet').click(function () {
				theList = $('#css').serialize();
				$("link[href*=sheet\\.php]:last").after('<link href="sheet.php?' + theList + '" type="text/css" rel="Stylesheet" />');
				if ($("link[href*=sheet\\.php]").size() > 2) {
					$("link[href*=sheet\\.php]:first").remove();
				}
			});
			$('#css input').change(function() {
				var theLink = "index.php?" + $('#css').serialize();
				$('#bookmark').attr('href', theLink);
			});
			$('#getsheet').click(function () {
				theList = $('#css').serialize();
				location.href = "sheet.php?" + theList;
			});
		});
	</script>
	<script type="text/javascript">
		jQuery.extend(jQuery.mobile.datebox.prototype.options, {
			useInline: true,
			overrideSlideFieldOrder: ['y','m','d','h','i']
		});
	</script>
</head>
<body>
<div data-role="page">
	<div data-role="header">
		<h1>jQM-DateBox - Theme Roller</h1>
	</div>
	
	<div data-role="main">
		<form id="css">
		<?php
			echo "\n";
			$lasttype = "";
			foreach ( $defaults as $key => $item ) {
				if ( $item[2] <> $lasttype ) {
					if ( $lasttype <> "" ) {
						echo "\t\t\t</div>\n";
						echo "\t\t\t<a href='#' class='applysheet ui-btn ui-btn-a ui-icon-check ui-btn-icon-left ui-shadow ui-corner-all'>Apply Changes</a>\n";
						echo "<div class='ui-field-contain'><input type='text' data-role='datebox' id='{$item[2]}' data-datebox-mode='{$item[2]}'></div>";
					}
					echo "\t\t\t<h2>{$item[2]} Options</h2>\n";
					echo "\t\t\t<div class='ui-field-contain'>\n";
					$lasttype = $item[2];
				}
				echo "\t\t\t\t<label for='{$key}'>{$item[1]}</label>\n";
				if ( $item[3] <> false ) {
					echo "\t\t\t\t<input name='{$key}' id='{$key}' value='{$use[$key]}' type='range' min='{$item[3]}' max='{$item[4]}'>\n";
				} else {
					echo "\t\t\t\t<input name='{$key}' id='{$key}' value='{$use[$key]}' type='text'>\n";
				}
			}
			echo "\t\t\t</div>\n";
			echo "\t\t\t<a href='#' class='applysheet ui-btn ui-btn-a ui-icon-check ui-btn-icon-left ui-shadow ui-corner-all'>Apply Changes</a>\n";
		?>

		</form>
		<a id="getsheet" href="#" data-role="button" data-theme="b">Get Stylesheet</a>
		<a id="bookmark" href="#" data-role="button" data-theme="b">Bookmark this Version</a>
		
		
		<!--div id="display" style="margin-left: 553px; margin-top: 180px">
				Howdy Ho.
			<input name="theme1" id="theme0" type="text" data-role="datebox" data-options='{"mode":"calbox", "calShowWeek":true}' />
			<-input name="theme1" id="theme1" type="text" data-role="datebox" data-options='{"mode":"calbox"}' />
			<input name="theme2" id="theme2" type="text" data-role="datebox" data-options='{"mode":"datebox"}' />
			<input name="theme3" id="theme3" type="text" data-role="datebox" data-options='{"mode":"flipbox"}' />
			<input name="theme4" id="theme4" type="text" data-role="datebox" data-options='{"mode":"slidebox", "overrideSlideFieldOrder":["y","m","d","h","i"], "overrideDateFormat":"%Y-%m-%d %H:%M:00"}' />
		</div-->
	</div>
	<div data-role="footer">
		<h3>jQM-DateBox (c) 2014</h3>
	</div>
</div>
</body>
</html>
