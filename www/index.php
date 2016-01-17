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

<script src="cordova.js"></script>


  </head>
<body>

 <div class="container-fluid">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!--<div class="navbar-header">
    
      
    </div>--->
	
	<div class="navbar-header">
	<a class="navbar-brand" href="index.html"><big>Sri <i class="host"> Host </i></big> <sub> Torrents Searcher </sub></a>
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
  <div class="row">
    <div class="col-sm-12">
      <div class="col-sm-12 total_torrents" style="background-color:#1C242E;padding: 12px;border-top-left-radius: 15px;border-top-right-radius: 15px;color:#fff;">
            
          </div>
            <div class="col-sm-12 size_details" style="background-color:#97A4A6;color:#fff;">
			<div class="col-sm-9"></div>
              <ul class="order_list col-sm-3" style="font-size:12px;">
                <li><a href="#menu2">Size</a></li>
                 <li><a href="#menu2">Date</a></li>
                <li><a href="#menu1">Seeds</a></li>
                <li><a href="#menu2">Peers</a></li>
              </ul>
            </div>

      <div class="col-sm-12" style="background-color:#fff;">
        <div class="tab-content">
          <div class="tab-pane active torrent_data" id="a" style="height: auto;">


             <!-- Modal -->
            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" style="top:15%;outline:none;">
              <div class="modal-dialog" style="width: 175px;">
                <div class="modal-content">
                  <!--<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Modal title</h4>
                  </div>-->
                  <div class="modal-body" style="padding:0;">
                   <img src="assets/images/loading.gif" style="width:175px;"/>
                  </div>
                  <!--<div class="modal-footer">Modal Footer Content
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>-->
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


          <!--<div class="col-sm-12" id="loading" style="display:none;background-color:black;">
            <div class="col-sm-5">
            </div>
            <div class="col-sm-7">
                          <img src="/images/loading.gif"/>

            </div>
          </div>-->

          <ul class="list-group pull-left" id="all_torrents">

          </ul>

          </div>
        </div><!-- /tab-content -->
      </div><!-- /tabbable -->
        <div class="col-sm-12" style="background-color:#1C242E;padding: 12px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;height:60px;">
            <ul class="pagination pagination-sm pull-right" style="padding:0;margin:0;">
              
            </ul>
        </div>

       

    </div><!-- /col -->
  </div><!-- /row -->

<script>
$(document).ready(function(){
$(document).on('click','a',function(e) {
    if ($(this).attr('target') === '_blank') {
        window.open($(this).attr('href'),'_system','location=no');
        e.preventDefault();
    }
});
});
</script>


<div class="row" style="padding-top:50px;">
  <div class="panel-footer container-fluid navbar-fixed-bottom">
    <div class="text-center">SriHost © 2016 Srinivas. All Rights Reserved.</div>
  </div>
</div>



</div><!-- /container -->



</body>
</html> 