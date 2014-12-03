function favorite(post_id, fav_num) {
    $.ajax({
        url: "/posts/favorite",
        type: "POST",
        data: { 
            post_id : post_id,
            fav_num : fav_num
        },
        dataType: "text",
        success : function(response){
            //通信成功時の処理
            alert(response);
        },
        error: function(){
            alert('通信失敗。何らかのエラーでfavできませんでした。');
        }
    });
}