<?php 

  class Token{
    // מגדיר את הסוג קידוד
    static $ciphering = "AES-128-CTR";
    // המילה הסודית
    static $secret_key = "MonkeysSecret";
    // החוזק של ההצפנה לחקור ... אם זה עובד
    static $encryption_iv = '9234567891011121';

    // מייצר טוקן
    static function genToken($user_id, $expired = 60*60){
      // מייצרים משתנה שישמר בטוקן של הזמן עכשיו בעוד שעה
      // בפורמט יוניקס ומפרידים
      // בין האיי די לזמן ב3 מקפים
      $timeExpired = time()+$expired;
      $token = openssl_encrypt($user_id."---".$timeExpired, self::$ciphering,
           self::$secret_key, 0, self::$encryption_iv);
        return $token;
    }

    // מתרגם את הקוד של הטוקן
    //h9m2FQ== -> מחזיר 777
    // בדוק גם אם הטוקן לא אקספיירד
    static function validateToken($token) {
      $decodeToken = openssl_decrypt($token, self::$ciphering,self::$secret_key, 0, self::$encryption_iv);
      // הופך את הקוד המפוצח למערך לפי ה 3 מקפים
      // תא 0 מכיל את האיי די
      // ותא 1 מכיל את הזמן יוניקס בשביל בדיקת תוקף
      $arToken = explode("---",$decodeToken);
      // אם המערך הוא פחות מ2 תאים זה אומר שיש בעיית הצפנה בפיענוח
      // ואז הטוקן לא תקין
      if(count($arToken) < 2){
        return NULL;
      }
      // בודק אם התא השני שזה הזמן עדיין גדול מזמן היוניקס של עכשיו
      if($arToken[1] > time()){
        // אם הכל תקין
        return $arToken[0];
      }
      else{
        return NULL;
      }
    }
  }
