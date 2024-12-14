<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Palette Gallery</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            top: calc(100% + 8px);
            background-color: white;
            min-width: 200px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1;
            border-radius: 8px;
            overflow: hidden;
        }

        .dropdown-content a, .dropdown-content p {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-size: 14px;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans">
    <header class="bg-gray-800 text-white py-5 shadow-md flex items-center justify-between px-6">
        <div class="flex items-center">
            <img src="{{ asset('images/image.png') }}" alt="Logo" class="w-12 h-12 mr-2" />
            <h1 class="text-3xl font-bold">Color Palette Gallery</h1>
        </div>
        <div id="user-info" class="flex items-center relative">
            <img id="profile-icon" src="{{ asset('images/user.png') }}" alt="Profile" class="w-12 h-12 rounded-full cursor-pointer hidden" />
            <div id="dropdown" class="dropdown-content">
                <p id="greeting-text"></p>
                <a id="logout-link" href="#" onclick="confirmLogout()">Logout</a>
            </div>
            <a id="login-link" href='auth-login' class="text-white font-bold ml-4 hidden">Login</a>
        </div>
    </header>

    <!-- hardcoded login and logout for now, will be replaced with actual authentication system -->
    <script>
        // Check if the user is logged in using localStorage
        const username = localStorage.getItem("username");

        if (username) {
            // If username is found in localStorage, show greeting in the dropdown
            const greetingText = document.getElementById("greeting-text");
            greetingText.textContent = `Hello, ${username}`;
            greetingText.classList.remove("hidden");

            // Show the profile icon
            document.getElementById("profile-icon").classList.remove("hidden");

            // Show the dropdown content when the profile icon is clicked
            const profileIcon = document.getElementById("profile-icon");
            profileIcon.addEventListener('click', () => {
                const dropdown = document.getElementById("dropdown");
                dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
            });

            // Hide the dropdown content if clicked outside
            window.addEventListener('click', (event) => {
                if (!event.target.closest('#user-info')) {
                    const dropdown = document.getElementById("dropdown");
                    if (dropdown.style.display === "block") {
                        dropdown.style.display = "none";
                    }
                }
            });
        } else {
            // If no user is logged in, show login link
            document.getElementById("login-link").classList.remove("hidden");
        }

        // Confirm logout function
        function confirmLogout() {
            if (confirm("Want to logout?")) {
                // Remove the username from localStorage
                localStorage.removeItem("username");

                // Hide the greeting text and dropdown
                document.getElementById("greeting-text").classList.add("hidden");
                document.getElementById("dropdown").style.display = "none";

                // Hide the profile icon
                document.getElementById("profile-icon").classList.add("hidden");

                // Show the login link again
                document.getElementById("login-link").classList.remove("hidden");

                // Optionally, show a logout message or confirmation without redirecting
                alert("You have been logged out!");
            }
        }
    </script>

<main class="p-8 flex flex-wrap gap-8 justify-center bg-gray-100">
    <div class="p-8 flex flex-wrap gap-8 justify-center">
        @foreach ($colorPalettes as $palette)
        <div class="bg-white shadow-lg rounded-lg border border-gray-200 w-60 hover:shadow-2xl transition-shadow duration-300">
            <!-- Nama palet -->
            <h3 class="text-center font-bold text-lg text-gray-800 mb-4 p-4">{{ $palette->name }}</h3>
            @if (!empty($palette->colors) && is_array($palette->colors))
            <!-- Warna dalam tabel penuh -->
            <div class="rounded-md overflow-hidden">
                @foreach ($palette->colors as $color)
                <div class="relative group h-16 w-full cursor-pointer flex items-center"
                    style="background-color: {{ $color['code'] }};" onclick="copyToClipboard(this, '{{ $color['code'] }}')">
                    <!-- Teks dinamis, hanya muncul saat hover -->
                    <span
                        class="absolute left-4 text-white font-semibold text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out">
                        {{ $color['code'] }}
                    </span>
                </div>
                @endforeach
            </div>
            @else
            <p class="text-gray-500 text-sm text-center p-4">No colors available</p>
            @endif
        </div>
        @endforeach
    </div>
</main>


<script>
    // Fungsi untuk menyalin teks dan memberi umpan balik "Copied"
    function copyToClipboard(element, text) {
        navigator.clipboard.writeText(text).then(() => {
            // Ubah teks menjadi "Copied!"
            const textElement = element.querySelector('span');
            textElement.textContent = 'Copied!';
            textElement.style.opacity = 1; // Tampilkan teks

            // Sembunyikan kembali teks setelah 2 detik
            setTimeout(() => {
                textElement.style.opacity = 0; // Sembunyikan teks
                textElement.textContent = text; // Kembalikan teks aslinya
            }, 2000);
        }).catch(err => {
            console.error('Failed to copy: ', err);
        });
    }
</script>

</body>

</html>
