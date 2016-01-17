$(function(){



$(document).ajaxStart(function () {
   $('#myModal1').modal('show');
});

$(document).ajaxStop(function () {

     $('#myModal1').modal('hide');
});

current_page_number = 0;
total_pages = 0 ;



$(document).on('click', '#search', function (){  
  $(".auto_compleate").hide();
  fetch($("#search_term").val(),current_page_number)

});

$(document).on('click', '.pagination_li', function (){  

current_page_number = $(this).attr("id");

fetch($("#search_term").val(),current_page_number)

}); 


window.fetch = function (search_term,current_page_number){
  console.log(search_term,current_page_number);
  var all_torrents = "";
  var Torrentz = [];
    $.ajax({
        url: 'http://srihost.com/HomeController.php',
        method: 'POST',
        dataType : "html",
        data: {page: current_page_number,name: search_term},
        success: function(data) {
		$(data).find('dl').each(function(i,j){
        Torrentz.push({
          url:$(this).find('dt').find('a').attr('href'),
          title:$(this).find('dt').find('a').html(),
          old:$(this).find('dd').find('span').eq(1).find('span').html(),
          size:$(this).find('dd').find('span').eq(3).html(),
          seeds:$(this).find('dd').find('span').eq(4).html(),
          Leechers:$(this).find('dd').find('span').eq(5).html()
        })

      });

      Torrentz.push({page_ignation:$(data).find('p').find('span').find('a').eq(-3).html()})
      Torrentz.push({total_torrents:$(data).find('h2').html()})

         total_torrents = Torrentz[parseInt(Torrentz.length)-parseInt(1)].total_torrents;
         total_pages = Torrentz[parseInt(Torrentz.length)-parseInt(2)].page_ignation;
         $("#all_torrents").html(all_torrents);
             $(Torrentz).each(function(i,j){
              if(parseInt(Torrentz.length)-parseInt(3) > i)
              {
                   var Torrent_Link = Torrentz[i].url;
				   
//href="links.php?link='+Torrent_Link.substring(1)+'">'+Torrentz[i].title+'</a> </div>
           
                  all_torrents += '<li class="list-group-item clearfix"><div class="row"><div class="col-sm-9"><a class="my_torrents_links" id="'+Torrent_Link.substring(1)+'" href="#">'+Torrentz[i].title+'</a> </div><div class="col-sm-3"><div class="col-sm-4 right_width">'+Torrentz[i].size+'</div><div class="col-sm-3 right_width">'+Torrentz[i].old+'</div><div class="col-sm-3 right_width">'+Torrentz[i].seeds+'</div><div class="col-sm-2 right_width">'+Torrentz[i].Leechers+'</div></div></div></li>'
              }
           });

          var li = "<li></li>";
          if(current_page_number != 0)
          {
            var li = "<li class='pagination_li' id='"+(parseInt(current_page_number)-parseInt(1))+"'><a href='#' aria-label='Previous'><span aria-hidden='true'>«</span></a></li>";
          }

          console.log(current_page_number+" "+total_pages);
          for(i=parseInt(current_page_number);i<=parseInt(total_pages);i++)
          {
                li += "<li class='pagination_li' id='"+i+"'><a href='#'>"+i+"</a></li>";
                console.log(i);
          }

          li += "<li class='pagination_li' id='"+parseInt(total_pages)+"'><a href='#' aria-label='Next'><span aria-hidden='true'>»</span></a></li>";
		
		  $(".size_details").show();	
		  $(".pagination").show();
          $('.pagination').html(li);
          $("#all_torrents").html(all_torrents);
          $(".total_torrents").html(total_torrents+' Searched');
		  
		   

          $(".auto_compleate").hide();
                 
        },
        failure: function(msg) {
            alert("Fail : " + msg);
        }
      });

}

$("#search_term").keydown(function(e){
  var key = e.which;
    if(key == 13) {
        $('#search').click();
        $(".auto_compleate").hide();
        return false;
    }

});

$("#search_term").keyup(function(){

  var search_terms = [];
  var get_search_val = $("#search_term").val(); 
  if(get_search_val.length>3)
  {

          $.ajax({
            url: 'http://srihost.com/SearchController.php',
            method: 'POST',
            dataType : "json",			
            global: false,  
            data:{
                page: '0',
                name: get_search_val
             },
            success: function(data) {
			search_terms = JSON.parse(data);
			//console.log(search_terms[1][1]);
             var option = '';

             $.each(search_terms[1], function(i,j) {

                option += '<a href="#" class="list-group-item auto_class_li">'+search_terms[1][i]+'</a>';

              });

             $(".auto_compleate").html(option);
             $(".auto_compleate").show();

            },
            failure: function(msg) {
                alert("Fail : " + msg);
            }
          });
         


  }else{

    $(".auto_compleate").hide();
  }

});

$(document).on('click', '.auto_class_li', function (){ 
  $("#search_term").val($(this).text())
  $(".auto_compleate").hide();
});


$(document).on('click', '.ext_torrents', function (){ 
	var ref2 = window.open(encodeURI(this.id), '_system', 'location=yes');
	
	//var ref2 = window.open(encodeURI(this.id), '_blank', 'location=no,closebuttoncaption=Close,enableViewportScale=yes');
//var ref2 = window.open(encodeURI('http://ja.m.wikipedia.org/wiki/????'), '_blank', 'location=yes');

	})
$(document).on('click', '.my_torrents_links', function (){ 
$(".total_torrents").html("Download Locations");
$(".size_details").hide();
$(".pagination").hide(); 
//var ref2 = window.open(encodeURI('http://ja.m.wikipedia.org/wiki/????'), '_blank', 'location=yes');

var search_term = this.id;
console.log(search_term);
var all_torrents = "";
var Torrentz = [];
  $.ajax({
    url: 'http://srihost.com/LinksController.php',
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
	  //href="'+Torrentz[i].url+'"
          $(Torrentz).each(function(i,j){
			if(Torrentz[i].url_title!=undefined){
				all_torrents += '<li class="list-group-item clearfix"><div class="row"><div class="col-sm-4"><a class="ext_torrents" id="'+Torrentz[i].url+'" href="#">'+Torrentz[i].url_title+'</a> </div><div class="col-sm-8">'+Torrentz[i].title+'</div></div></li>'

			}
          
       });
      $("#all_torrents").html(all_torrents);
             
    },
    failure: function(msg) {
        alert("Fail : " + msg);
    }
  });



});


});