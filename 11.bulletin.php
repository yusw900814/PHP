<a href=12.logout.php>[登出]</a><br>
<?php
#原本的佈告欄範例，結合session功能後，變成只能登入後，才能夠瀏覽
error_reporting(0); #error_reporting(0)：取消錯誤或警告
session_start(); #啟動 Session，取得登入狀態
if (!$_SESSION["id"]) {
  #檢查是否有登入 ID，沒有的話就顯示請先登入並跳轉回登入頁面
    echo "請先登入";
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
}
else{
    #顯示歡迎訊息跟功能選單
    echo "歡迎, ".$_SESSION["id"]."[<a href=12.logout.php>登出</a>] [<a href=18.user.php>管理使用者</a>] [<a href=22.bulletin_add_form.php>新增佈告</a>]<br>";
    #連資料庫
    $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
    #把佈告欄的資料全部抓出來
    $result=mysqli_query($conn, "select * from bulletin");
    #用表格顯示出來
    echo "<table border=2><tr><td></td><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";
    #用迴圈一筆一筆把佈告印在表格裡面
    while ($row=mysqli_fetch_array($result)){
      # 顯示修改與刪除連結，並透過 URL 傳遞該筆資料的 bid
        echo "<tr><td><a href=26.bulletin_edit_form.php?bid={$row["bid"]}>修改</a> 
        <a href=28.bulletin_delete.php?bid={$row["bid"]}>刪除</a></td><td>";
      # 依序印出資料庫欄位內容：編號、類別、標題、內容、時間
        echo $row["bid"];
        echo "</td><td>";
        echo $row["type"];
        echo "</td><td>"; 
        echo $row["title"];
        echo "</td><td>";
        echo $row["content"]; 
        echo "</td><td>";
        echo $row["time"];
        echo "</td></tr>";
    }
    echo "</table>";    
}
#佈告欄總表為所有程式的會合處，需擁有以下功能 登出功能 使用者管理功能 新增、刪除、編輯佈告欄的功能
?>
