<style>
  .post-content{
    
    height:40px;
    max-width:370px;
    text-overflow: ellipsis;
    overflow:hidden;
  }
</style>
<section class="section-wrapper posts-w">
<div class="container">
<div class="row">
<div class="span12">
<h3 class="section-header"><i class="icon-file-text"></i> Campaigns</h3>

</div>
</div>
<div class="row">
  <div class="" style="">
  <span class="sortby-type-span span8" style=" font-size:22px;"><i class="icon-sort"></i> Sort by: <strong>Most Recent</strong></span>
  <div class=""style="float:right; span4" >
    <button class="all-most-recent-btn btn" style="margin-top:-10px;" data-toggle="tooltip" title="Sort by 'Most Recent'"><i class="icon-time"></i> </button>
    <button style="margin-top:-10px;" data-toggle="tooltip" title="Sort by 'Soon to End'" class="btn all-soon-to-end-btn"><i class="icon-calendar"></i> </button>
    <button style="margin-top:-10px;" data-toggle="tooltip" title="Sort by 'Most Popular'" class="btn all-most-popular-btn"><i class="icon-star"></i></button>
    <input style="width:140px;" class="all-search-campaign-input" placeholder="Campaign Name"  data-provide="typeahead"  data-items="4" type="text">
    <button class="btn all-search-byname-btn" type="button" style="margin-top:-10px;"><i class="icon-search" ></i> Search</button>
  </div>
  </div>
</div>

<div class="row campaign-content" >

</div>

<div id="paginator-campaign-all-recent" style="">
</div>
<div id="paginator-campaign-all-popular" style="">
</div>
<div id="paginator-campaign-all-soontoend" style="">
<div id="paginator-campaign-all-byname" style="">
</div>
</div>
</div>
</section>


<script type="text/javascript">
  
  jQuery(function($){

  
  var totalPages;
  var username = $(".username-small").text();

  

  $.ajax({
    url : "/campaign/sort/all/recent/",
    async : false,
    success : function(data){
      $(".campaign-content").html(data);
      totalPages = $(".campaign-content").find(".campaign-totalpages").val();
      //alert(totalPages);
      if(totalPages == 0){
        $("campaign-content").html('<div class="alert alert-danger" ><button type="button" class="close" data-dismiss="alert">&times;</button><strong>0 Result. </strong>No Campaign found.</div>');
      }
    // $('.paginator-campaign-created').bootstrapPaginator({currentPage : 1, totalPages: totalPages});
    }
  
  });
  
  if (totalPages > 1){

  var options = {
              currentPage: 1,
              totalPages: totalPages,
              onPageClicked: function(e,originalEvent,type,page){
                              $.ajax({
                                url : "/campaign/sort/all/recent?page="+page,
                                async : false,
                                success : function(data){
                                  $(".campaign-content").html(data);
                                  totalPages = $(".campaign-content").find(".campaign-totalpages").val();
                                  //alert(page);
                                  
                                }
                              });
                          }
          }
  $('#paginator-campaign-all-recent').bootstrapPaginator(options);
  }


  $(".all-most-recent-btn").click(function(){
    $('.sortby-type-span').html('<i class="icon-sort"></i> Sort by: <strong>Most Recent</strong>');
    $('#paginator-campaign-all-recent').show();
    $('#paginator-campaign-all-soontoend').hide();
    $('#paginator-campaign-all-byname').hide();
    $('#paginator-campaign-all-popular').hide();

    var totalPages;
    
    $.ajax({
      url : "/campaign/sort/all/recent/?page=1",
      async : false,
      success : function(data){
        $(".campaign-content").html(data);
        totalPages = $(".tab1-content").find(".campaign-totalpages").val();
        if(totalPages == 0){
          $(".campaign-content").html('<div class="alert alert-danger" ><button type="button" class="close" data-dismiss="alert">&times;</button><strong>0 Result.</strong>No Campaign found</div>');
        }
                                  

      }
    });
    
    
    if (totalPages > 1){
    var options = {
                currentPage: 1,
                totalPages: totalPages,
                onPageClicked: function(e,originalEvent,type,page){
                       $.ajax({
                        url : "/campaign/sort/all/recent/?page="+page,
                        async : false,
                        success : function(data){
                          $(".campaign-content").html(data);
                          totalPages = $(".campaign-content").find(".campaign-totalpages").val();
                          //$(".donate-btn").popover();
                        }
                       });
                }
            }
    $('#paginator-campaign-all-recent').bootstrapPaginator(options);
    }
  });

  $(".all-soon-to-end-btn").click(function(){
    $('.sortby-type-span').html('<i class="icon-sort"></i> Sort by: <strong>Soon to End</strong>');
    $('#paginator-campaign-all-byname').hide();
    $('#paginator-campaign-all-recent').hide();
    $('#paginator-campaign-all-soontoend').show();
    $('#paginator-campaign-all-byname').hide();

    var totalPages;
    
    $.ajax({
      url : "/campaign/sort/all/soontoend?page=1",
      async : false,
      success : function(data){
        $(".campaign-content").html(data);
        totalPages = $(".campaign-content").find(".campaign-totalpages").val();
        
        
        
        
        if(totalPages == 0){
          $(".campaign-content").html('<div class="alert alert-danger" ><button type="button" class="close" data-dismiss="alert">&times;</button><strong>0 Result.</strong>No Campaign found</div>');
        }
                        

      }
    });
    
    
    if (totalPages > 1){
    var options = {
                currentPage: 1,
                totalPages: totalPages,
                onPageClicked: function(e,originalEvent,type,page){
                       $.ajax({
                        url : "/campaign/sort/all/soontoend?page="+page,
                        async : false,
                        success : function(data){
                          $(".campaign-content").html(data);
                          totalPages = $(".campaign-content").find(".campaign-totalpages").val();
                          //$(".donate-btn").popover();
                          
                        }
                       });
                }
            }
    $('#paginator-campaign-all-soontoend').bootstrapPaginator(options);
    }
  });

  $(".all-most-popular-btn").click(function(){
    $('.sortby-type-span').html('<i class="icon-sort"></i> Sort by: <strong>Most Popular</strong>');

    $('#paginator-campaign-all-popular').show();
    $('#paginator-campaign-all-soontoend').hide();
    $('#paginator-campaign-all-byname').hide();
    $('#paginator-campaign-all-recent').hide();

    var totalPages;
 
    $.ajax({
      url : "/campaign/sort/all/popular?page=1",
      async : false,
      success : function(data){
        $(".campaign-content").html(data);
        totalPages = $(".campaign-content").find(".campaign-totalpages").val();
        if(totalPages == 0){
          $(".campaign-content").html('<div class="alert alert-danger" ><button type="button" class="close" data-dismiss="alert">&times;</button><strong>0 Result.</strong>No Campaign found</div>');
        }
                                  

      }
    });
    
    
    if (totalPages > 1){
    var options = {
                currentPage: 1,
                totalPages: totalPages,
                onPageClicked: function(e,originalEvent,type,page){
                       $.ajax({
                        url : "/campaign/sort/all/popular?page="+page,
                        async : false,
                        success : function(data){
                          $(".campaign-content").html(data);
                          totalPages = $(".campaign-content").find(".campaign-totalpages").val();
                          //$(".donate-btn").popover();
                        }
                       });
                }
            }
    $('#paginator-campaign-all-popular').bootstrapPaginator(options);
    }
  });
  
  $(".all-search-byname-btn").click(function(){
    $('.sortby-type-span').html('<i class="icon-sort"></i> Sort by: <strong>Specific Name</strong>');
    $('#paginator-campaign-all-recent').hide();
    $('#paginator-campaign-all-popular').hide();
    $('#paginator-campaign-all-soontoend').hide();
    $('#paginator-campaign-all-byname').show();
    var totalPages;
    var username = $(".username-small").text();
    $.ajax({
      url : "/campaign/sort/all/byname?page=1",
      async : false,
      data : {
          campname : $('.all-search-campaign-input').val()
      },
      success : function(data){
        $(".campaign-content").html(data);
        totalPages = $(".tab1-content").find(".campaign-totalpages").val();
        if(totalPages == 0){
          $(".campaign-content").html('<div class="alert alert-danger" ><button type="button" class="close" data-dismiss="alert">&times;</button><strong>0 Result.</strong>No Campaign found</div>');
        }
                                  

      }
    });
    
    
    if (totalPages > 1){
    var options = {
                currentPage: 1,
                totalPages: totalPages,
                onPageClicked: function(e,originalEvent,type,page){
                       $.ajax({
                        url : "/campaign/sort/all/byname?page="+page,
                        async : false,
                        success : function(data){
                          $(".campaign-content").html(data);
                          totalPages = $(".campaign-content").find(".campaign-totalpages").val();
                          //$(".donate-btn").popover();
                        }
                       });
                }
            }
    $('#paginator-campaign-all-byname').bootstrapPaginator(options);
    }
  });

  var datasource= [];

  $.ajax({
    url : "/campaign/title/all",
    type : "GET",
    dataType : "json",
    async : false,
    success : function(data){
      
      //console.log(data[0].name);
       $.each(data, function(index, data1){
        datasource.push(data[index].name);
       });
    }  
  });
  $(".all-search-campaign-input").typeahead({source:datasource});
  });
</script>