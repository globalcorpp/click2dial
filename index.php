<?php
$content ='
<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
<script type="text/javascript">
$(function(){
$(".search").keyup(function() 
{ 
var searchid = $(this).val();
var dataString = \'search=\'+ searchid;
if(searchid!=\'\')
{
    $.ajax({
    type: "POST",
    url: "search.php",
    data: dataString,
    cache: false,
    success: function(html)
    {
    $("#result").html(html).show();
    }
    });
    
}else{
    
    $(".show").hide();
        
    }
return false;    
});

jQuery("#result").live("click",function(e){ 
    var $clicked = $(e.target);
    var $name = $clicked.find(\'.name\').html();
    var decoded = $("<div/>").html($name).text();
    $(\'#searchid\').val(decoded);
});
jQuery(document).live("click", function(e) { 
    var $clicked = $(e.target);
    if (! $clicked.hasClass("search")){
    jQuery("#result").fadeOut(); 
    }
});
$(\'#searchid\').click(function(){
    jQuery("#result").fadeIn();
});
});
</script>

<style type="text/css">
    .content{
        width:900px;
        margin:0 auto;
    }
    #searchid
    {
        width:500px;
        border:solid 1px #eee;
        padding:10px;
        font-size:14px;
        border-radius: 10px;
        text-align: right;
        margin-right: 28px;
    }
    #result
    {
        position:absolute;
        width: 520px;
        display:none;
        margin-top:40px;
        border-top:0px;
        overflow:auto;
        background-color: white;
        margin-left: 93px;
        border-radius: 10px;
        max-height: 35%;
    }
    .show
    {
        padding:10px; 
        border-bottom:1px #eee solid;
        font-size:15px; 
        height:30px;
    }
    .show:hover
    {
        background:#91dff5;
        color:#FFF;
        cursor:pointer;
    }
</style>

<div class="content">
<input type="text" class="search" id="searchid" placeholder="جستجو" />&nbsp; &nbsp; <b><i>مثال: شماره داخلي، نام خانوادگي</i></b><br />
<div id="result"></div>
</div>';


$pre = 1;
$title = "سامانه تماس ایزابل";
$heading = "";
include("html.inc");
?>