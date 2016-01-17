<!DOCTYPE html>
<html>
    <head>
      <title>SriHost:Torrents Searcher</title>
 <link rel="stylesheet" href="assets/styles/bootstrap.css">
 <link rel="stylesheet" href="assets/styles/style.css">
 <link rel="stylesheet" href="assets/styles/easy-autocomplete.css">
 <link rel="stylesheet" href="assets/styles/easy-autocomplete.themes.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta property="og:image" content="/assets/images/loading.gif" />

<!--SCRIPTS-->
<script src="assets/js/dependencies/jquery-2.1.1.js"></script>
<script src="assets/js/dependencies/bootstrap.js"></script>
<script src="assets/js/dependencies/index.js"></script>
<script src="assets/js/dependencies/jquery.easy-autocomplete.js"></script>
<script src="assets/js/dependencies/main.js"></script>


  </head>
<body>

 <div class="container-fluid">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!--<div class="navbar-header">
    
      
    </div>--->
	
	<div class="navbar-header">
	<a class="navbar-brand" href="/"><big>Sri <i class="host"> Host </i></big> <sub> Torrents Searcher </sub></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
		
    	 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <!--<ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Page 1-1</a></li>
            <li><a href="#">Page 1-2</a></li>
            <li><a href="#">Page 1-3</a></li>
          </ul>
        </li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
      </ul>-->
	  <ul class="nav navbar-nav navbar-right">
		<li><a href="/"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
		<li><a href="/"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	  </ul> 
	 
    </div>
  </div>
</nav>




  <div class="row">
    <div class="col-md-12">
      <div class="col-md-12" style="background-color: rgba(0, 0, 0, 0.5);min-height: 58px;padding: 12px;border-radius: 15px;">
        <div class="col-sm-10" style="height:40px;">
          <input class="form-control" type="text" name="search_term" id="search_term" value="" placeholder="Search Anything To Download"/>  

          <div class="auto_compleate list-group" style="position:relative;z-index:20;display:none;">
            

          </div>
                

        </div>
        <div class="center-block col-sm-2" style="/* margin-top:10px;">
          <button type="button" id="search" class="btn btn-default btn-block  greyGradient center-block" data-toggle="modal" data-target="#myModal1">Search&nbsp;<span class="fa fa-search"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
  <br>
      <div class="row">
        <div class="col-md-12">


        </div>
      </div>

<br>