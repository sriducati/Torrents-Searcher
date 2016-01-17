<?php
include("header.php");
//$Torrent_link = $_GET['link'];

$Torrent_link = $_GET['link'];
?>

  <div class="row">
    <div class="col-sm-12">
      <div class="col-md-12 total_torrents" style="background-color:#1C242E;padding: 12px;border-top-left-radius: 15px;border-top-right-radius: 15px;color:#fff;">
            Download Locations
          </div>
            <!--<div class="col-md-12" style="background-color:#97A4A6;color:#fff;">
              <ul class="order_list">
                <li><a href="#menu2">Size</a></li>
                 <li><a href="#menu2">Date</a></li>
                <li><a href="#menu1">Seeds</a></li>
                <li><a href="#menu2">Peers</a></li>
              </ul>
            </div>-->

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


          <!--<div class="col-md-12" id="loading" style="display:none;background-color:black;">
            <div class="col-md-5">
            </div>
            <div class="col-md-7">
                          <img src="/images/loading.gif"/>

            </div>
          </div>-->

          <ul class="list-group pull-left" id="all_torrents">

          </ul>

          </div>
        </div><!-- /tab-content -->
      </div><!-- /tabbable -->
        <div class="col-md-12" style="background-color:#1C242E;padding: 12px;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;height:60px;">
            <ul class="pagination pagination-sm pull-right" style="padding:0;margin:0;">
              
            </ul>
        </div>

       

    </div><!-- /col -->
  </div><!-- /row -->


<!--SCRIPTS END-->
<script>
$(function(){

  $(document).ajaxStart(function () {

   // $(".torrent_data").css({"opacity":0.6})
     // loading.show();
     $('#myModal1').modal('show');
  });

  $(document).ajaxStop(function () {
     // loading.hide();
       $('#myModal1').modal('hide');

     // $(".torrent_data").css({"opacity":1.0})
       // $(".auto_compleate").hide();
  });


var search_term = "<?php echo $Torrent_link; ?>";
console.log(search_term);
var all_torrents = "";
var Torrentz = [];
  $.ajax({
    url: 'LinksController.php',
    method: 'POST',
    dataType : "html",
    data:{name: search_term},
    success: function(data) {
	
	    $(data).find('dl').each(function(i,j){
          Torrentz.push({
          url:$(this).find('dt').find('a').attr('href'),
          url_title:$(this).find('dt').find('a').find('span').eq(0).eq(0).html(),
          title:$(this).find('dt').find('a').find('span').eq(1).html(),

        })

      });
	  
      console.log(Torrentz);
          $(Torrentz).each(function(i,j){
			if(Torrentz[i].url_title!=undefined){
				all_torrents += '<li class="list-group-item clearfix"><div class="row"><div class="col-sm-4"><a href="'+Torrentz[i].url+'">'+Torrentz[i].url_title+'</a> </div><div class="col-sm-8">'+Torrentz[i].title+'</div></div></li>'

			}
          
       });
      $("#all_torrents").html(all_torrents);
             
    },
    failure: function(msg) {
        alert("Fail : " + msg);
    }
  });
});




/*$("#search").click(function(){

var all_torrents = '';
var search_term = $('#search_term').val();
$.ajax({
    url: '/fetch_torrentz',
    method: 'POST',
    contentType: 'application/json', 
    processData: false,
    data: JSON.stringify({
        page: '0',
        name: search_term
     }),
    success: function(data) {
     // console.log(data);
          $(data).each(function(i,j){

          all_torrents += '<li class="list-group-item clearfix"><div class="row"><div class="col-sm-10"><a href="/links'+data[i].url+'">'+data[i].title+'</a> </div><div class="col-sm-2"><div class="col-sm-3 right_width">'+data[i].size+'</div><div class="col-sm-4 right_width">'+data[i].old+'</div><div class="col-sm-3 right_width">'+data[i].seeds+'</div><div class="col-sm-2 right_width">'+data[i].Leechers+'</div></div></div></li>'

       });
      $("#all_torrents").html(all_torrents);
             
    },
    failure: function(msg) {
        alert("Fail : " + msg);
    }
  });

});*/


</script>






<?php
include("footer.php");
?>



