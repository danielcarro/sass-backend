@vite('resources/css/app.css')
@vite('resources/js/app.js')

<!DOCTYPE html>
<html lang="pt-BR" class="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistema</title>
</head>

<body class="bg-gray-900 text-white min-h-screen flex flex-col">


    @include('partials.navbar')

    <div class="flex flex-1 pt-16"> <!-- pt-16 para compensar navbar fixa -->

        @include('partials.sidebar')

         <main class=" flex-1 p-4 bg-gray-300 text-black dark:bg-gray-900 dark:text-white ">
            @yield('content')
        </main>

    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggleSidebar'); // botão do menu na navbar        

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });
    </script>


    <script>
        const sidebarMD = document.getElementById("sidebar");
        const sidebarBtnToogle = document.getElementById("sidebarBtnToogle");

        console.log(sidebarMD.classList.contains("-translate-x-full"));

        function updateButton() {
            if (sidebarMD.classList.contains("-translate-x-full")) {
                // Sidebar aberto: botão colado no final do sidebar (left-40), ícone fechar
                sidebarBtnToogle.textContent = "✕";
                sidebarBtnToogle.classList.remove("left-0");
                sidebarBtnToogle.classList.add("left-40");

            } else {
                // Sidebar fechado: botão na esquerda da tela, ícone menu
                sidebarBtnToogle.textContent = "☰";
                sidebarBtnToogle.classList.remove("left-40");
                sidebarBtnToogle.classList.add("left-0");
            }
        }

        sidebarBtnToogle.addEventListener("click", () => {
            if (sidebarMD.classList.contains("-translate-x-full")) {
                sidebarMD.classList.toggle("-translate-x-full");
                sidebarMD.style.display = "none";
                updateButton();
            }else{
                sidebarMD.classList.toggle("-translate-x-full");
                sidebarMD.style.display = "block";
                updateButton();
            }
        });

        // Inicializa o estado correto
        updateButton();
    </script>



    <script>
        // Aplica tema salvo
        if (localStorage.theme === 'dark' ||
            (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }

        // Botão toggle
        const themeToggle = document.getElementById('themeToggle');
        themeToggle?.addEventListener('click', () => {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.theme = 'light';
            } else {
                document.documentElement.classList.add('dark');
                localStorage.theme = 'dark';
            }
        });
    </script>


</body>

</html>
