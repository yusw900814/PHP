<?php
    session_start();    # 啟動 Session，才知道要刪除哪一個人的登入紀錄
    unset($_SESSION["id"]); # 把 Session 裡面存的 id 刪掉，代表登出
    echo "登出成功....";
    echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";
    # 3秒後自動跳轉回到登入頁面
?>
