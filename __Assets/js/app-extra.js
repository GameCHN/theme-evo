jQuery(function($){
    $('.seek .s-btn').click(function(){
       var $s = $('.seek input[type="text"]').val();
        $s = $s == '请输入搜索关键词' ? '' :encodeURIComponent($s);
        if($s){
            location.href = '/?s=' + $s;
        }
    });


});