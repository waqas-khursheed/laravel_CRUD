$(document).ready(function(){
    $(".search-tab").click(function(){
        $(".search-container-top >div").show();
        $(".close-tab").show();
    });
});

$(document).ready(function(){
    $(".search-container-top .close-tab").click(function(){
        $(".search-container-top >div").hide();
        $(".close-tab").hide();
    });
});

