// 文字数カウント
function showlength(str){
    document.getElementById("count").innerHTML = str.length + "文字";
}

// 画像アップロードサムネイル(トップページ)
$(function(){
	$('#PostsPhoto').change(
	    function() {
	        if ( !this.files.length ) {
	            return;
	        }
	 
	        var file = $(this).prop('files')[0];
	        var fr = new FileReader();
	        fr.onload = function() {
	            $('#preview').attr('src', fr.result ).css('display','inline');
	    }
	    fr.readAsDataURL(file);
    })
});

// 無限スクロール(トップページ)
$(function() {
    $("#content_load").infinitescroll({
        navSelector : '#page-nav', // ナビゲーション
        nextSelector : '#page-nav a', // 次ページへのリンク
        itemSelector : '#content_index', // 次ページ内で探す要素
        loading : {
            finishedMsg : 'これ以上、エビートはありません。',
            img : '../img/loader.gif'// ローディング画像
        }
    });

	$(window).unbind('.infscr');    // 初期化をやめ
 
	// クリックごとに動作をする
	$('#page-nav a').click(function(){
		$(document).trigger('retrieve.infscr');
		return false;
	});
});

// Flashメッセージをゆっくり消す
$(function() {
    setTimeout(function() {
        $('#flashMessage').fadeOut("slow");
    }, 1300);
});

// コメントエリア展開
function comment_launch(id){
	var id = id;
	var area = "#comment_area_" + id;
	var inner = "#comment_area_" + id + " .comment_area_inner";

	$(function(){
        $(area).toggle();
        $(area).css({"margin-bottom":"10px"});
        $(inner).css({"border-radius":"0  0 10px 10px"});
	});

}