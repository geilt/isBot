<?php
include('isBot.class.php'); 
$isBot = new isBot(); 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset="utf-8" />
        <link rel="shortcut icon" href="/favicon.ico"/>
        
        <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="/css/style.css" rel="stylesheet" type="text/css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore-min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
        <title>Do I look Like a Bot?</title>
    </head>
    <body>
    	<div class="container">
    			<div class="page-header text-center">
	              <h1>Do You Look Like a Bot?</h1>
	            </div>
    			<div class="jumbotron text-center">
    				<h1>The Answer Is</h1>
                <p><?php echo !empty($isBot->answer)? 'Yes, yes you do.' : 'Nope! All Clean!'; ?></p>
                <?php if(!empty($isBot->answer)): ?>
	                <p><button class="btn btn-primary btn-lg" data-toggle="collapse" data-target="#whycome">Whycome I look like a bot?</button></p>
	                <p id="whycome" class="collapse">
	                	Cuz: <?php echo $isBot->why; ?>
	                </p>
                <?php endif; ?>
                <p>How do we knows? Download the Source!</p>
                <iframe src="http://ghbtns.com/github-btn.html?user=geilt&repo=isbot&type=watch&size=large"
  allowtransparency="true" frameborder="0" scrolling="0" width="90px" height="30px"></iframe>
  		<iframe src="http://ghbtns.com/github-btn.html?user=geilt&type=follow&size=large"
  allowtransparency="true" frameborder="0" scrolling="0" width="160px" height="30px"></iframe>
   		<iframe src="http://ghbtns.com/github-btn.html?user=esotech&type=follow&size=large"
  allowtransparency="true" frameborder="0" scrolling="0" width="200px" height="30px"></iframe>
              	</div>
  
    		</div>
    	</div>
    	
    </body>
</html>