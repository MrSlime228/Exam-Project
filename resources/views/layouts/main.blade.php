<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=-1.0Ж">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        Шапка
    </header>
    <main>
        {{$slot}}
    </main>
    <footer>
        <p>
            &copy; Пляшник Андрей Валерьевич, 2026 г.
        </p>
        <p>
            Вы также можете найти меня <a href="https://www.inueco.ru/" target="_blank">здесь...</a>    
        </p>
        <a href="https://t.me/Mr_Slime_123" target="_blank" ><img class="icon" src="img/telegram_2.png" alt="telegram link" > </a>
        <a href="https://discord.com" target="_blank" ><img class="icon" src="img/discord_2.png" alt="discord link" > </a>
        <a href="https://vk.com/id135037636" target="_blank" ><img class="icon" src="img/VKontakte.svg" alt="VK link" > </a>
    </footer>  
    
</body>
</html>