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
<h3 class="section-header"><i class="icon-group"></i> Contributors</h3>

</div>
</div>
<div class="row">
  <div class="" style="">
  <span class="sortby-type-span span8" style=" font-size:22px;"><i class="icon-sort"></i> Sort by: <strong>Top Contributors</strong></span>
  <div class=""style="float:right; span4" >
    <button style="margin-top:-10px;" data-toggle="tooltip" title="Sort by 'Top Contributor'" class="btn top-contributor-btn"><i class="icon-star"></i></button>
    <input style="width:140px;" class="search-contributor-input" placeholder="Contributor Name"  data-provide="typeahead"  data-items="4" type="text">
    <button class="btn search-contributor-byname-btn" type="button" style="margin-top:-10px;"><i class="icon-search" ></i> Search</button>
  </div>
  </div>
</div>

<div class="row contributor-content" >

</div>

<div id="paginator-top-contributor" style="">
</div>
<div id="paginator-contributor-byname" style="">
</div>
</div>
</div>
</section>


<script type="text/javascript">
  
  jQuery(function($){

  
  var totalPages;
 

  

  $.ajax({
    url : "/contributor/sort/top",
    async : false,
    success : function(data){
      $(".contributor-content").html(data);
      totalPages = $(".contributor-content").find(".contributor-totalpages").val();
      //alert(totalPages);
      if(totalPages == 0){
        $("contributor-content").html('<div class="alert alert-danger" ><button type="button" class="close" data-dismiss="alert">&times;</button><strong>0 Result. </strong>No Campaign found.</div>');
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
                                url : "/contributor/sort/top?page="+page,
                                async : false,
                                success : function(data){
                                  $(".contributor-content").html(data);
                                  totalPages = $(".contributor-content").find(".contributor-totalpages").val();
                                  //alert(page);
                                  
                                }
                              });
                          }
          }
  $('#paginator-top-contributor').bootstrapPaginator(options);
  }

  $('.top-contributor-btn').click(function(){
    $('.sortby-type-span').html('<i class="icon-sort"></i> Sort by: <strong>Top Contributors</strong>');
    $('#paginator-top-contributor').show();
    $('#paginator-contributor-byname').hide();
    var totalPages;

    $.ajax({
      url : "/contributor/sort/top?page=1",
      async : false,
      success : function(data){
        $(".contributor-content").html(data);
        totalPages = $(".contributor-content").find(".contributor-totalpages").val();
        if(totalPages == 0){
          $(".contributor-content").html('<div class="alert alert-danger" ><button type="button" class="close" data-dismiss="alert">&times;</button><strong>0 Result.</strong>No Campaign found</div>');
        }
                                  

      }
    });
    
    
    if (totalPages > 1){
    var options = {
                currentPage: 1,
                totalPages: totalPages,
                onPageClicked: function(e,originalEvent,type,page){
                       $.ajax({
                        url : "/contributor/sort/top?page="+page,
                        async : false,
                        success : function(data){
                          $(".contributor-content").html(data);
                          totalPages = $(".contributor-content").find(".contributor-totalpages").val();
                          //$(".donate-btn").popover();
                        }
                       });
                }
            }
    $('#paginator-top-contributor').bootstrapPaginator(options);
    }
  });
 


  $(".search-contributor-byname-btn").click(function(){
    $('.sortby-type-span').html('<i class="icon-sort"></i> Sort by: <strong>Specific Name</strong>');
    $('#paginator-top-contributor').hide();
    $('#paginator-contributor-byname').show();
    var totalPages;

    $.ajax({
      url : "/contributor/sort/byname?page=1",
      async : false,
      data : {
          contname : $('.search-contributor-input').val()
      },
      success : function(data){
        $(".contributor-content").html(data);
        totalPages = $(".contributor-content").find(".contributor-totalpages").val();
        if(totalPages == 0){
          $(".contributor-content").html('<div class="alert alert-danger" ><button type="button" class="close" data-dismiss="alert">&times;</button><strong>0 Result.</strong>No Campaign found</div>');
        }
                                  

      }
    });
    
    
    if (totalPages > 1){
    var options = {
                currentPage: 1,
                totalPages: totalPages,
                onPageClicked: function(e,originalEvent,type,page){
                       $.ajax({
                        url : "/contributor/sort/byname?page="+page,
                        async : false,
                        success : function(data){
                          $(".contributor-content").html(data);
                          totalPages = $(".contributor-content").find(".contributor-totalpages").val();
                          //$(".donate-btn").popover();
                        }
                       });
                }
            }
    $('#paginator-contributor-byname').bootstrapPaginator(options);
    }
  });

  var datasource= [];

  $.ajax({
    url : "/contributor/title",
    type : "GET",
    dataType : "json",
    async : false,
    success : function(data){
      
      //console.log(data[0].name);
       $.each(data, function(index, data1){
        datasource.push(data[index].username);
       });
    }  
  });
  $(".search-contributor-input").typeahead({source:datasource});
  });
</script>