<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
	    <link rel="stylesheet" href="https://abs.twimg.com/a/1418162186/css/t1/twitter_core.bundle.css">
	    <link rel="stylesheet" href="https://abs.twimg.com/a/1418162186/css/t1/twitter_logged_out.bundle.css">
	    <title>Evitterへようこそ - ログインまたは新規登録</title>
      	<meta name="robots" content="NOODP">
      	<meta name="description" content="友だちや魅力的な人々とつながって、興味のある最新情報を見つけましょう。そして、いま起きているできごとを様々な角度から見てみましょう。">
  </head>
  <body class="three-col logged-out asian ja front-page-photo-set front-page" data-fouc-class-names="swift-loading" dir="ltr">
    <div id="doc" class="">
        <div class="topbar js-topbar    ">
  <div class="global-nav" data-section-term="top_nav">
    <div class="global-nav-inner">
      <div class="container">
        
        <ul class="nav js-global-actions">
          <li class="home" data-global-action="t1home">
            <a class="nav-logo-link" href="/" data-nav="front">
              <img src="/img/logo.png" style="width:130px; margin-top:7px;">
            </a>
          </li>
        </ul>
        
        <div class="pull-right">
          <ul class="nav secondary-nav language-dropdown">
            <li class="dropdown js-language-dropdown">
                <small>言語:</small> <span class="js-current-language">日本語</span>
            </li></ul><ul class="nav secondary-nav session-dropdown" id="session"><li class="dropdown js-session">
              <a href="/login" class="dropdown-toggle js-dropdown-toggle dropdown-signin" id="signin-link" data-nav="login">
                <small>アカウントをお持ちの場合は</small> ログイン <span class="caret"></span>
              </a>
              <a href="https://twitter.com/signup?context=login" class="dropdown-signup" id="signup-link" data-nav="signup">
                <small>Twitter は初めてですか?</small> <span class="emphasize"> 今すぐ登録 &raquo;</span>
              </a>
              <div class="dropdown-menu dropdown-form" id="signin-dropdown">
                <div class="dropdown-caret right"> <span class="caret-outer"></span> <span class="caret-inner"></span> </div>
                <div class="signin-dialog-body"> <form action="https://twitter.com/sessions" class="t1-form js-signin signin" method="post">
  <fieldset>
    <legend id="signin-form-legend" class="visuallyhidden">ログイン</legend>
    <div class="textbox">
  <label class="t1-label username js-username">
    <span>電話番号、メールアドレスまたはユーザー名</span>
    <input class="js-username-field email-input js-initial-focus" type="text" name="session[username_or_email]" autocomplete="on">
  </label>
  <label class="t1-label password js-password">
    <span>パスワード</span>
    <input class="js-password-field" type="password" value="" name="session[password]">
  </label>
</div>

    <div class="subchck">
  <button type="submit" class="btn submit">ログイン</button>
  <label class="t1-label remember">
    <input type="checkbox" value="1" name="remember_me" checked="checked">
    <span>保存する</span>
  </label>
</div>

<input type="hidden" name="scribe_log">
<input type="hidden" name="redirect_after_login" value="/">
<input type="hidden" value="99fe1338e10f36f1be5dd9d9d7b01e02100dd17d" name="authenticity_token"/>

  </fieldset>
  <div class="divider"></div>
  <p class="footer-links">
    <a class="forgot" href="/account/begin_password_reset">パスワードを忘れた場合はこちら</a><br />
    <a class="mobile has-sms" href="/account/complete">既にテキストメッセージで Twitter をご利用ですか?</a>
  </p>
</form>
 </div>
              </div>
            </li></ul>
        </div>
      </div>
    </div>
  </div>

</div>

        <div id="page-outer">
          <div id="page-container" class="AppContent  wrapper-front">
              





            <div class="front-container front-container-full-signup" id="front-container">

    <div class="front-bg">
      <img class="front-image" src="https://abs.twimg.com/a/1418162186/img/t1/front_page/exp_wc2014_gen_laurenlemon.jpg" alt="">
    </div>

  <div class="front-card   ">

      <div class="front-welcome">

          <div class="front-welcome-text">
            <h1>Evitterへようこそ</h1>
            <p>恵比寿ハウスの住人や、恵比寿ハウスによく遊びにくる魅力的な人々とつながって、楽しいコミュニティに入りましょう。そして、いま起きているできごとを様々な角度から見てみましょう。</p>
          </div>

      </div>


      <?php echo $this->Session->flash(); ?>

      <?php echo $this->fetch('content'); ?>

    
  </div>

  <div class="footer inline-list">
  <ul>
    <li><a href="/about">Evitterについて</a><span class="dot divider"> &middot;</span></li>
    <li><a href="">ヘルプ</a><span class="dot divider"> &middot;</span></li>
    <li><a href="">ブログ</a><span class="dot divider"> &middot;</span></li>
    <li><a href="">ステータス</a><span class="dot divider"> &middot;</span></li>
    <li><a href="">採用情報</a><span class="dot divider"> &middot;</span></li>
    <li><a href="">規約</a><span class="dot divider"> &middot;</span></li>
    <li><a href="">プライバシー</a><span class="dot divider"> &middot;</span></li>
    <li><a href="">開発者</a><span class="dot divider"> &middot;</span></li>
      <li><a href="/i/directory/profiles">プロフィール一覧</a><span class="dot divider"> &middot;</span></li>
    <li><span class="copyright">&copy; 2014 Evitter</span></li>
  </ul>
</div>

</div>
          </div>
        </div>
      
    </div>
    <div class="alert-messages hidden" id="message-drawer">
    <div class="message ">
  <div class="message-inside">
    <span class="message-text"></span>
      <a role="button" class="Icon Icon--close Icon--medium dismiss" href="#">
        <span class="visuallyhidden">非表示にする</span>
      </a>
  </div>
</div>
</div>

    
<div class="gallery-overlay"></div>
<div class="Gallery">
  <div class="Gallery-closeTarget"></div>
  <div class="Gallery-content">
    <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--large">
    <span class="visuallyhidden">閉じる</span>
  </span>
</button>

    <div class="Gallery-media"></div>
    <div class="GalleryNav GalleryNav--prev">
      <span class="GalleryNav-handle GalleryNav-handle--prev">
        <span class="Icon Icon--caretLeft Icon--large">
          <span class="u-hiddenVisually">
            以前の
          </span>
        </span>
      </span>
    </div>
    <div class="GalleryNav GalleryNav--next">
      <span class="GalleryNav-handle GalleryNav-handle--next">
        <span class="Icon Icon--caretRight Icon--large">
          <span class="u-hiddenVisually">
            次へ
          </span>
        </span>
      </span>
    </div>
    <div class="GalleryTweet"></div>
  </div>
</div>



<div class="modal-overlay"></div>




<div id="goto-user-dialog" class="modal-container">
  <div class="modal modal-small draggable">
    <div class="modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">閉じる</span>
  </span>
</button>


      <div class="modal-header">
        <h3 class="modal-title">プロフィールページへ</h3>
      </div>

      <div class="modal-body">
        <div class="modal-inner">
          <form class="t1-form goto-user-form">
            <input class="input-block username-input" type="text" placeholder="名前を入力してプロフィールを見る" aria-label="ユーザー">
            


<div role="listbox" class="dropdown-menu typeahead">
  <div aria-hidden="true" class="dropdown-caret">
    <div class="caret-outer"></div>
    <div class="caret-inner"></div>
  </div>
  <div role="presentation" class="dropdown-inner js-typeahead-results">
    <div role="presentation" class="typeahead-saved-searches">
  <h3 id="saved-searches-heading" class="typeahead-category-title saved-searches-title">検索メモ</h3>
  <ul role="presentation" class="typeahead-items saved-searches-list">
    
    <li role="presentation" class="typeahead-item typeahead-saved-search-item">
      <span class="icon close" aria-hidden="true"><span class="visuallyhidden">削除</span></span>
      <a role="option" aria-describedby="saved-searches-heading" class="js-nav" href="" data-search-query="" data-query-source="" data-ds="saved_search" tabindex="-1"></a>
    </li>
  </ul>
</div>

    <ul role="presentation" class="typeahead-items typeahead-topics">
  
  <li role="presentation" class="typeahead-item typeahead-topic-item">
    <a role="option" class="js-nav" href="" data-search-query="" data-query-source="typeahead_click" data-ds="topics" tabindex="-1">
    </a>
  </li>
</ul>


    


<ul role="presentation" class="typeahead-items typeahead-accounts js-typeahead-accounts">
  
  <li role="presentation" data-user-id="" data-user-screenname="" data-remote="true" data-score="" class="typeahead-item typeahead-account-item js-selectable">
    
    <a role="option" class="js-nav" data-query-source="typeahead_click" data-search-query="" data-ds="account">
      <img class="avatar size32" alt="">
      <span class="typeahead-user-item-info">
        <span class="fullname"></span>
        <span class="js-verified hidden"><span class="Icon Icon--verified Icon--small"><span class="u-hiddenVisually">認証済みアカウント</span></span>
</span>
        <span class="username"><s>@</s><b></b></span>
      </span>
    </a>
  </li>
  <li role="presentation" class="js-selectable typeahead-accounts-shortcut js-shortcut"><a role="option" class="js-nav" href="" data-search-query="" data-query-source="typeahead_click" data-shortcut="true" data-ds="account_search"></a></li>
</ul>

    <ul role="presentation" class="typeahead-items typeahead-trend-locations-list">
  
  <li role="presentation" class="typeahead-item typeahead-trend-locations-item"><a role="option" class="js-nav" href="" data-ds="trend_location" data-search-query="" tabindex="-1"></a></li>
</ul>
    <div role="presentation" class="typeahead-user-select">
  <div role="presentation" class="typeahead-empty-suggestions">
    おすすめユーザー
  </div>
  <ul role="presentation" class="typeahead-items typeahead-selected js-typeahead-selected">
    
    <li role="presentation" data-user-id="" data-user-screenname="" data-remote="true" data-score="" class="typeahead-item typeahead-selected-item js-selectable">
      
      <a role="option" class="js-nav" data-query-source="typeahead_click" data-search-query="" data-ds="account">
        <img class="avatar size32" alt="">
        <span class="typeahead-user-item-info">
          <span class="select-status deselect-user js-deselect-user Icon Icon--check"></span>
          <span class="select-status select-disabled Icon Icon--unfollow"></span>
          <span class="fullname"></span>
          <span class="js-verified hidden"><span class="Icon Icon--verified Icon--small"><span class="u-hiddenVisually">認証済みアカウント</span></span>
</span>
          <span class="username"><s>@</s><b></b></span>
        </span>
      </a>
    </li>
    <li role="presentation" class="typeahead-selected-end"></li>
  </ul>

  <ul role="presentation" class="typeahead-items typeahead-accounts js-typeahead-accounts">
    
    <li role="presentation" data-user-id="" data-user-screenname="" data-remote="true" data-score="" class="typeahead-item typeahead-account-item js-selectable">
      
      <a role="option" class="js-nav" data-query-source="typeahead_click" data-search-query="" data-ds="account">
        <img class="avatar size32" alt="">
        <span class="typeahead-user-item-info">
          <span class="select-status deselect-user js-deselect-user Icon Icon--check"></span>
          <span class="select-status select-disabled Icon Icon--unfollow"></span>
          <span class="fullname"></span>
          <span class="js-verified hidden"><span class="Icon Icon--verified Icon--small"><span class="u-hiddenVisually">認証済みアカウント</span></span>
</span>
          <span class="username"><s>@</s><b></b></span>
        </span>
      </a>
    </li>
    <li role="presentation" class="typeahead-accounts-end"></li>
  </ul>
</div>

    <div role="presentation" class="typeahead-dm-conversations">
  <ul role="presentation" class="typeahead-items typeahead-dm-conversation-items">
    <li role="presentation" class="typeahead-item typeahead-dm-conversation-item">
      <a role="option" tabindex="-1"></a>
    </li>
  </ul>
</div>
  </div>
</div>

          </form>
        </div>
      </div>

    </div>
  </div>
</div>


  <div id="retweet-tweet-dialog" class="modal-container">
  <div class="close-modal-background-target"></div>
  <div class="modal draggable">
    <div class="modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">閉じる</span>
  </span>
</button>


      <div class="modal-header">
        <h3 class="modal-title">このツイートをリツイートしますか?</h3>
      </div>

      <div class="tweet-loading">
  <div class="spinner-bigger"></div>
</div>

      <div class="modal-body modal-tweet"></div>

      <div class="modal-footer">
        <button class="btn cancel-action js-close">キャンセル</button>
        <button class="btn primary-btn retweet-action">リツイート</button>
      </div>
    </div>
  </div>
</div>

  <div id="delete-tweet-dialog" class="modal-container">
  <div class="close-modal-background-target"></div>
  <div class="modal draggable">
    <div class="modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">閉じる</span>
  </span>
</button>


      <div class="modal-header">
        <h3 class="modal-title">このツイートを本当に削除しますか?</h3>
      </div>

      <div class="tweet-loading">
  <div class="spinner-bigger"></div>
</div>

      <div class="modal-body modal-tweet"></div>

      <div class="modal-footer">
        <button class="btn cancel-action js-close">キャンセル</button>
        <button class="btn primary-btn delete-action">削除</button>
      </div>
    </div>
  </div>
</div>


<div id="block-user-dialog" class="modal-container">
  <div class="close-modal-background-target"></div>
  <div class="modal draggable">
    <div class="modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">閉じる</span>
  </span>
</button>


      <div class="modal-header">
        <h3 class="modal-title">ブロック</h3>
      </div>

      <div class="tweet-loading">
  <div class="spinner-bigger"></div>
</div>

      <div class="modal-body modal-tweet"></div>

      <div class="modal-footer">
        <button class="btn cancel-action js-close">キャンセル</button>
        <button class="btn primary-btn block-action">ブロック</button>
      </div>
    </div>
  </div>
</div>



  
  

     <div id="geo-disabled-dropdown">
      <div class="GeoSearch-dropdownMenu dropdown-menu" tabindex="-1">
  <div class="dropdown-caret">
    <span class="caret-outer"></span>
    <span class="caret-inner"></span>
  </div>
  <ul>
    <li class="geo-not-enabled-yet">
      <h2>ツイートに位置情報を追加する</h2>
      <p>
        位置情報と一緒にツイートした場合、Twitterはその位置情報も保存します。&#32;
        毎回ツイートする際に、位置情報を付加する/付加しないを選択することができ、いつでも過去の位置情報を全て削除することも可能です。
        <a href="http://support.twitter.com/forums/26810/entries/78525" target="_blank">詳しい説明</a>
      </p>
      <div>
        <button type="button" class="geo-turn-on btn primary-btn">位置情報を許可</button>
        <button type="button" class="geo-not-now btn-link">今はしない</button>
      </div>
    </li>
  </ul>
</div>
    </div>

  <div id="geo-enabled-dropdown">
    <div class="GeoSearch-dropdownMenu dropdown-menu" tabindex="-1">
  <div class="dropdown-caret">
    <span class="caret-outer"></span>
    <span class="caret-inner"></span>
  </div>
  <ul>
    <li class="geo-query-location">
      <input class="GeoSearch-queryInput" type="text" autocomplete="off" placeholder="近所や市を探す">
      <span class="icon generic-search"></span>
    </li>
    <li class="geo-dropdown-status"></li>
    <li class="dropdown-link geo-turn-off-item GeoSearch-focusable">
      <span class="icon close"></span>位置情報を無効化
    </li>
  </ul>
</div>
  </div>


  <div id="profile_popup" class="modal-container ProfilePopupContainer--bellbird">
  <div class="close-modal-background-target"></div>
  <div class="modal modal-small draggable">
    <div class="modal-content clearfix">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">閉じる</span>
  </span>
</button>

      <div class="modal-header">
        <h3 class="modal-title">プロフィール</h3>
      </div>

      <div class="modal-body profile-modal">

      </div>

      <div class="loading">
        <span class="spinner-bigger"></span>
      </div>
    </div>
  </div>
</div>

  <div id="list-membership-dialog" class="modal-container">
  <div class="close-modal-background-target"></div>
  <div class="modal modal-small draggable">
    <div class="modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">閉じる</span>
  </span>
</button>

      <div class="modal-header">
        <h3 class="modal-title">マイリスト</h3>
      </div>
      <div class="modal-body">
        <div class="list-membership-content"></div>
        <span class="spinner lists-spinner" title="読み込み中&hellip;"></span>
      </div>
    </div>
  </div>
</div>
  <div id="list-operations-dialog" class="modal-container">
  <div class="close-modal-background-target"></div>
  <div class="modal modal-medium draggable">
    <div class="modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">閉じる</span>
  </span>
</button>

      <div class="modal-header">
        <h3 class="modal-title">新しいリストを作成</h3>
      </div>
      <div class="modal-body">
        
<div class="list-editor">
  <div class="field">
    <label class="t1-label" for="list-name">リスト名</label>
    <input id="list-name" type="text" class="text" name="name" value="" />
  </div>
  <hr/>

  <div class="field">
    <label class="t1-label" for="list-description">説明</label>
    <textarea id="list-description" name="description"></textarea>
    <span class="help-text">100文字以下(オプション)</span>
  </div>
  <hr/>

  <fieldset class="field">
    <legend class="t1-legend">プライバシー</legend>
    <div class="options">
      <label class="t1-label" for="list-public-radio">
        <input class="radio" type="radio" name="mode" id="list-public-radio" value="public" checked="checked"  />
        <b>公開</b> &middot; このリストは誰でもフォローできます
      </label>
      <label class="t1-label" for="list-private-radio">
        <input class="radio" type="radio" name="mode" id="list-private-radio" value="private"  />
        <b>非公開</b> &middot; 自分のみこのリストにアクセス可能
      </label>
    </div>
  </fieldset>
  <hr/>

  <div class="list-editor-save">
    <button type="button" class="btn btn-primary update-list-button" data-list-id="">リストを保存</button>
  </div>

</div>

      </div>
    </div>
  </div>
</div>

  <div id="activity-popup-dialog" class="modal-container">
  <div class="close-modal-background-target"></div>
  <div class="modal draggable">
    <div class="modal-content clearfix">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">閉じる</span>
  </span>
</button>


      <div class="modal-header">
        <h3 class="modal-title"></h3>
      </div>

      <div class="modal-body">
        <div class="tweet-loading">
  <div class="spinner-bigger"></div>
</div>

        <div class="activity-tweet modal-tweet clearfix"></div>
        <div class="loading">
          <span class="spinner-bigger"></span>
        </div>
        <div class="activity-content clearfix"></div>
      </div>
    </div>
  </div>
</div>





  <div id="embed-tweet-dialog" class="modal-container">
  <div class="close-modal-background-target"></div>
  <div class="modal modal-medium draggable">
    <div class="modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">閉じる</span>
  </span>
</button>

      <div class="modal-header">
        <h3 class="modal-title">このツイートをサイトに埋め込む</h3>
      </div>
      <div class="modal-body">
        <div class="embed-code-container">
  <p>以下のコードをコピーしてサイトにツイートを埋め込むことができます。 <a href="//dev.twitter.com/docs/embedded-tweets">もっと詳しく</a></p>
  <form class="t1-form">

    <div class="embed-destination-wrapper">
      <div class="embed-overlay embed-overlay-spinner"><div class="embed-overlay-content"></div></div>
      <div class="embed-overlay embed-overlay-error">
        <p class="embed-overlay-content">サーバーとの通信で問題が発生しました。<button type="button" class="btn-link retry-embed">もう一度お試しください</button></p>
      </div>
      <textarea class="embed-destination js-initial-focus"></textarea>
      <div class="embed-options">
        <div class="embed-include-parent-tweet">
          <label class="t1-label" for="include-parent-tweet">
            <input type="checkbox" id="include-parent-tweet" class="include-parent-tweet" checked>
            元のツイートを含める
          </label>
        </div>
        <div class="embed-include-card">
          <label class="t1-label" for="include-card">
            <input type="checkbox" id="include-card" class="include-card" checked>
            メディアを含める
          </label>
        </div>
      </div>
    </div>
  </form>
  <div class="embed-preview">
    <h3>プレビュー</h3>
  </div>
</div>

      </div>
    </div>
  </div>
</div>



  <div id="signup-dialog" class="SignupDialog modal-container u-textCenter">
  <div class="close-modal-background-target"></div>
  <div class="modal modal-large draggable">
    <div class="SignupDialog-content modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">閉じる</span>
  </span>
</button>

      <div class="modal-header">
        <h3 class="modal-title">Twitterに登録する</h3>
      </div>
      <div class="SignupDialog-body modal-body">
        <div class="SignupDialog-bird">
          <span class="Icon Icon--bird Icon--large"></span>
        </div>
        <h2 class="SignupDialog-heading">Twitterを使ってみませんか?興味のあることをフォローして最新情報をチェックしましょう。</h2>
        <div class="SignupDialog-form">
          <form action="https://twitter.com/signup" method="post" class="SignupForm
  ">
  <div class="SignupForm-inputsContainer">
    <div class="SignupForm-input SignupForm-name">
      <input class="js-initial-focus" type="text" autocomplete="off" name="user[name]" maxlength="20" placeholder="名前">
    </div><div class="SignupForm-input SignupForm-email">
      <input class="email-input" type="text" autocomplete="off" name="user[email]" placeholder="メールアドレス">
    </div><div class="SignupForm-input SignupForm-password">
      <input type="password" name="user[user_password]" placeholder="パスワード">
    </div>
  </div>
  <input type="hidden" value="" name="context">
  <input type="hidden" value="99fe1338e10f36f1be5dd9d9d7b01e02100dd17d" name="authenticity_token"/>
  <input name="follows" type="hidden" value="">
  <input type="submit" class="SignupForm-submit btn primary-btn" value="Twitterに登録する">
</form>
        </div>
      </div>
      <div class="SignupDialog-footer modal-footer u-textCenter">
        アカウントをお持ちの場合は <a class="SignupDialog-signinLink" href="/login">ログイン &raquo;</a>
      </div>
    </div>
  </div>
</div>

  <div id="sms-codes-dialog" class="modal-container">
  <div class="close-modal-background-target"></div>
  <div class="modal modal-medium draggable">
    <div class="modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">閉じる</span>
  </span>
</button>

      <div class="modal-header">
        <h3 class="modal-title">双方向(送信と受信)のショートコード:</h3>
      </div>
      <div class="modal-body">
        
      </div>
    </div>
  </div>
</div>

<div id="leadgen-confirm-dialog" class="modal-container">
  <div class="close-modal-background-target"></div>
  <div class="modal draggable">
    <div class="modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--medium">
    <span class="visuallyhidden">閉じる</span>
  </span>
</button>

      <div class="modal-header">
        <h3 class="modal-title">確認</h3>
      </div>
      <div class="modal-body">
        <div class="leadgen-card-container">
          <div class="media">
            <iframe
              class="cards2-promotion-iframe"
              scrolling="no"
              frameborder="0"
              src="">
            </iframe>
          </div>
        </div>
        <div class="js-macaw-cards-iframe-container" data-card-name="promotion">
        </div>
      </div>
    </div>
  </div>
</div>



<div id="promptbird-modal-prompt" class="modal-container">
  <div class="close-modal-background-target"></div>
  <div class="modal">
    <div class="modal-content">
      <button type="button" class="modal-btn js-promptDismiss modal-close js-close">
        <span class="Icon Icon--close Icon--medium">
          <span class="visuallyhidden">閉じる</span>
        </span>
      </button>
      <div class="js-promptbird-modal-content"></div>
    </div>
  </div>
</div>


   <div id="payment-order-detail-dialog" class="PaymentOrderDialog modal-container">
  <div class="close-modal-background-target"></div>
  <div class="modal draggable">
    <div class="modal-content">
      <button type="button" class="modal-btn modal-close js-close">
  <span class="Icon Icon--close Icon--large">
    <span class="visuallyhidden">閉じる</span>
  </span>
</button>

      <div class="modal-header">
        <h3 class="modal-title">今すぐ購入</h3>
      </div>
      <div class="modal-body">
        <div class="alert">
          <h4>エラーが発生しました。しばらくしてから再度お試しください。</h4>
        </div>
        <div class="spinner-bigger"></div>
        <div class="PaymentOrderDialog-orderDetails"></div>
      </div>
    </div>
  </div>
</div>



<div id="create-custom-timeline-dialog" class="modal-container"></div>
<div id="edit-custom-timeline-dialog" class="modal-container"></div>
<div id="curate-dialog" class="modal-container"></div>


    <div class="hidden" id="hidden-content">
  <iframe aria-hidden="true" class="tweet-post-iframe" name="tweet-post-iframe"></iframe>
  <iframe aria-hidden="true" class="dm-post-iframe" name="dm-post-iframe"></iframe>
  <form class="t1-form media-upload-form" method="post">
    <input type="hidden" name="authenticity_token" class="auth-token">
    <input type="hidden" name="iframe_callback" class="iframe-callback">
    <input type="hidden" name="media" class="media">
    <input type="hidden" name="upload_id" class="upload-id">
    <input type="hidden" name="origin" class="origin">
  </form>

</div>

    
    <div id="spoonbill-outer"></div>
  </body>
</html>