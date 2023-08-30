<html>
    <head>
        <title>wxl的网站 | 图床</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script type="application/javascript" src="js/jquery-3.1.1.min.js"></script>
        <script type="application/javascript" src="js/bootstrap.min.js"></script>
        <script type="application/javascript" src="js/main.js"></script>
        <link rel="Shortcut Icon" href="./main.ico" type="image/x-icon" />
        <meta charset="utf-8">
        <script>
        function collect() {
            //开始javascript执行过程的数据收集
            console.profile();
            //配合profile方法，作为数据收集的结束
            console.profileEnd();
            //我们判断一下profiles里面有没有东西，如果有，肯定有人按F12了，没错！！
            if (console.clear) {
                //清空控制台
                console.clear()
            };
            if (typeof console.profiles == "object") {
                return console.profiles.length > 0;
            }
        }

        function check() {
            if ((window.console && (console.firebug || console.table && /firebug/i.test(console.table()))) || (typeof opera == 'object' && typeof opera.postError == 'function' && console.profile.length > 0)) {
                jump();
            }
            if (typeof console.profiles == "object" && console.profiles.length > 0) {
                jump();
            }
        }
        check();
        window.onresize = function() {
            //判断当前窗口内页高度和窗口高度
            if ((window.outerHeight - window.innerHeight) > 200||(window.outerWidth - window.innerWidth) > 200)
                jump();
        }

        function jump() {
            console.clear();
            alert('FUCK YOU,吊臂乱调控制台我祝你全家不得好死');
            window.location = "/fuckyou";
        }
        </script>
        <style type="text/css">
        .x4 {
            font-size: 4em;
        }
        .x2 {
            font-size: 2em;
        }
        .x1c25 {
            font-size: 1.25em;
        }
        .xc25 {
            font-size: 0.25em;
        }
        .x1 {
            font-size: 1em;
        }
        .jb{
            background : -webkit-linear-gradient(bottom,#fff,#FFEBCD);
            background : -o-linear-gradient(bottom,#fff,#FFEBCD);
            background : -moz-linear-gradient(bottom,#fff,#FFEBCD);
            background : linear-gradient(to top,#fff,#FFEBCD);
        }
        .card{
            display:block;
            margin-bottom:1.3em;
            background-color:#fff;
            border-radius:4px;
            box-shadow:0 1px 3px rgba(26,26,26,.1);
            box-sizing:border-box
        }
        </style>
        <link rel="stylesheet" href="./bootstrap-3.4.1-dist/css/bootstrap.css" th:href="@{/lib/semantic/dist/semantic.min.css}">
       
    </head>
    <nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
    </div>
    <div>
        <ul class="nav navbar-nav">
            <li class="active"></li>
            <li><a href="../index.php">wxl的网站</a></li>
            <li><a href="../liuyanban.php">留言板</a></li>
            <li><a href="../wjxz.php">文件下载</a></li>
            <li><a href="../spandtp.php">视频の图片</a></li>
            <li><a href="../wz.php">文章</a></li>
            <li><a href="../jy.php">建议</a></li>
            <li><a href="../upa/index.html">Markdown编辑器（来自麻花）</a></li>
            <li><a href="../tc/index.html">公用图床</a></li>
        </ul>
    </div>
    </div>
</nav>
    <body class="jb">
        <br><br><br>
        <h1 style=text-align:center class="x4">欢迎使用wxl的图床</h1>
        <hr>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form class="text-center" action="upload.php" method="post" enctype="multipart/form-data" target="iframe-content">
                        <div class="form-group">
                            <input type="file" id="file" name="file" class="center-block"><br>
                            <input type="checkbox" id="sc" name="sc">禁止被删除（管理员可从后台删除）
                        </div>
                        <button type="submit" class="btn btn-success">上传</button>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
            <br><br><br><br>
        <hr>
        <h1 style=text-align:center class="x2">以下为大佬们上传的图片（比例废了别找我，下载/独立查看/引用没问题）</h1>
        <?php
        define('IMAGEPATH', './img/');
        foreach(glob(IMAGEPATH . '*.{jpg,JPG,jpeg,JPEG,png,PNG}', GLOB_BRACE) as $filename){
            $imgs[] =  basename($filename);
        }
        foreach ($imgs as $img)
        {
            echo "<hr><br>";
            echo "<div class=\"card\">";
            echo "外链地址:wxl.com/tc/img/$img<br>";
            echo "操作：<br>";
            echo "<a href=\"/tc/img/$img\" download=\"$img\"><button class=\"down\">下载</button></a>";
            $res1 = fopen("./img/$img.ini", "r");
            $res = fread($res1,filesize("./img/$img.ini"));
            if (strpos($res,"sc=on")) {
               echo "<a><button class=\"down\">不可删除</button></a><br>";
            }else{
               echo "<a href=\"del.php?id=".$img."\"><button class=\"down\">删除</button></a><br>";
            }
            
            echo "<a href=\"img/$img\"><button class=\"down\">独立查看（新界面原比例查看）</button></a><br>";
            echo "</div>";
            echo "<img src=./img/$img  width=\"360\" height=\"640\">";
        }
        ?>
        </div>
        
    </body>
</html>
