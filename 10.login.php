<?php
   #mysqli_connect() 建立資料庫連結
   $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
   #mysqli_query() 從資料庫查詢資料
   $result=mysqli_query($conn, "select * from user");
   #mysqli_fetch_array() 從查詢出來的資料一筆一筆抓出來
   $login=FALSE; 
   # 先設定登入狀態為失敗
   while ($row=mysqli_fetch_array($result)) { # 逐筆讀取資料庫中的帳號密碼進行比對
     if (($_POST["id"]==$row["id"]) && ($_POST["pwd"]==$row["pwd"])) {
       # 帳密符合則將登入狀態設為 TRUE
       $login=TRUE;
     }
   } 
   # 登入成功的話，就開 session 把帳號記起來，跳轉到佈告欄
   if ($login==TRUE) {
    session_start();
    $_SESSION["id"]=$_POST["id"];
    echo "登入成功";
    echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
   }
   # 登入失敗就顯示錯誤訊息，退回登入頁面
  else{
    echo "帳號/密碼 錯誤";
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
  }
?>
