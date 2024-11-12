<!-- <nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="select.php"><button>記録を見る</button></a>　
            
            <?php if($_SESSION["kanri_flg"]=="1"){ ?>
                <a href="user.php"><button>新規ユーザー登録</button></a>　
            <?php } ?>
            
            <a class="navbar-brand" href="logout.php"><button>ログアウト</button></a>
        </div>
    </div>
</nav> -->

<header id="header">
    <!-- header左端のロゴ -->
    <div>
        <p class="header_logo"></p>
    </div>

    <!-- header右側メニュー -->
    <div class="header_menu">
        <div class="menu"><a class="no-color-change" href="#about">初めての方へ</a></div>
        <div class="menu"><a class="no-color-change" href="#area">対応可能エリア</a></div>
        <div class="menu"><a class="no-color-change" href="#price">料金</a></div>
        <div class="menu"><a class="no-color-change" href="#qa">よくある質問</a></div>
        <div class="menu"><a class="no-color-change" href="#contact">問合せ</a></div>
    </div> 
</header>