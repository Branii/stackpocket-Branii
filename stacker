

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>sdhfjsdjf</title>
	<style>
		body{
			background-color:rgb(250,250,250);
			
		}
	
		div#lipsum{
			
			max-width:500px;
			background-color:rgb(230,230,230);
			display:inline-block;
			padding-right:20px;
			padding-left:20px;
			padding-top:50px;
			padding-bottom:100px;
		}
		
		div#lipsum div#CoinStackBar{
			float:right;
			
		}
	</style>

	
</head>
<body onclick="setup()">
	<div id="lipsum">
		<div id="CoinStackBar" >
		</div>
	</div>
</body>
<script src="coinStackBarv0-7.js"></script>
<script type="text/javascript">
	window.requestAnimFrame = (function(callback){
					return window.requestAnimationFrame ||
					window.webkitRequestAnimationFrame ||
					window.mozRequestAnimationFrame ||
					window.oRequestAnimationFrame ||
					window.msRequestAnimationFrame ||
					function(callback){
						window.setTimeout(callback, 1000 / 60);
					};
				})();
		
		
		//The following functions are only to test the CoinStackBar object
        const coinimg = ['bitcoin.png'];
        let CS = new CoinStackBar({
        container:document.getElementById("CoinStackBar"),
        coinimgsrc:coinimg,
        coinimgwidth:150,
        coinimgheight:80,
        coinheight:30,
        xoffset:10,
        yoffset:6,
        startvalue:3.3,
        maxstackheight:30,
        containerwidth:50,
        containerheight:500,
        showshadow:false,
        //coinanimydrop:1,
        //coinanimxdrop:1
        });

        let count = 0;
		function setup(){
        
            CS.setValue(count);
            CS.setValue(count+=3.3)
            console.log(CS);
			
            //requestAnimFrame(test);
			//test();
		}
		
	</script>
</html>