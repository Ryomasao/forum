<!--コンテンツのヘッダ -->
<div class="content-header">
    <div class="nav">
        <input type="checkbox" id="nav-open" class="nav__button-hidden nav__button">
        <label class="burger" for="nav-open">
            <span class="burger__line"></span>
            <span class="burger__line"></span>
            <span class="burger__line"></span>
        </label>
        <div class="nav__content">
           <ul>
            <li><a href="{{ route('threads') }}">スレッド一覧</a></li>
            <li><a href="{{ route('files') }}">ファイル一覧</a></li>
           </ul> 
        </div>
    </div>
</div>
