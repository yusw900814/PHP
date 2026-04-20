<html>
    <head><title>使用者管理</title></head> 
    <body>
    <?php
    #使用者管理須提供以下功能 列出所有使用者 新增使用者功能 刪除使用者功能 修改使用者功能
        error_reporting(0); # 隱藏錯誤訊息
        session_start();  # 啟動Session，檢查登入狀態
        if (!$_SESSION["id"]) {
            echo "請登入帳號";
            echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
          # 如果沒登入就顯示訊息，3秒後跳回登入頁面
        }
        else{   
          # 顯示標題跟功能連結 新增使用者、回佈告欄列表
            echo "<h1>使用者管理</h1>
                [<a href=14.user_add_form.php>新增使用者</a>] [<a href=11.bulletin.php>回佈告欄列表</a>]<br>
                <table border=1>
                    <tr><td></td><td>帳號</td><td>密碼</td></tr>";
            # 連接資料庫
            $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
            # 從user資料表中抓出所有帳密
            $result=mysqli_query($conn, "select * from user");
            # 迴圈讀取每一筆使用者資料並印在表格中
            while ($row=mysqli_fetch_array($result)){
                # 顯示修改與刪除連結，並透過URL傳遞該筆資料的id
                echo "<tr><td><a href=19.user_edit_form.php?id={$row['id']}>修改</a>||<a href=17.user_delete.php?id={$row['id']}>刪除</a></td><td>{$row['id']}</td><td>{$row['pwd']}</td></tr>";
            }
            echo "</table>"; # 結束表格
        }
    ?> 
    </body>
</html>
