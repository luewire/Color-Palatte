<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="h-screen flex items-center justify-center bg-gradient-to-r from-blue-500 via-purple-600 to-pink-500">
    <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md">

        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/image.png') }}" alt="Logo" class="w-20 h-20 rounded-full">
        </div>

        <!-- Welcome Message -->
        <h1 class="text-3xl font-extrabold text-center text-gray-900 mb-4">Welcome Back!</h1>
        <p class="text-center text-gray-600 mb-8">Please enter your login details to continue.</p>

        <!-- Login Form -->
        <form id="loginForm" class="space-y-6">

            <!-- Username Input -->
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input id="username" name="username" type="text" placeholder="Enter your username"
                    class="mt-1 block w-full px-4 py-3 rounded-lg border border-gray-300 text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out">
                <span id="errorMessage" class="text-red-500 text-sm hidden"></span>
            </div>

            <!-- Password Input -->
            <div class="relative">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="flex">
                    <input id="password" name="password" type="password" placeholder="Enter your password"
                        class="mt-1 block w-full px-4 py-3 rounded-lg border border-gray-300 text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out">
                    <button id="togglePassword" type="button"
                        class="ml-2 px-3 py-3 text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none">
                        Show
                    </button>
                </div>
            </div>

            <!-- Login Button -->
            <button id="tombol" type="submit"
                class="w-full bg-gradient-to-r from-blue-600 to-blue-400 text-white py-3 rounded-lg font-medium hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-200 ease-in-out">
                Login
            </button>
        </form>

        <!-- Forgot Password Link -->
        <div class="mt-6 text-center">
            <a href="#" class="text-sm text-blue-600 hover:underline">Forgot your password?</a>
        </div>
    </div>

    <script>
        // Hardcoded users for validation (for demo purposes)
        const users = [
            { username: "alfian", password: "1234" },
            { username: "user", password: "abcd" }
        ];

        // Login logic
        document.getElementById("loginForm").addEventListener("submit", function (event) {
            event.preventDefault();  // Prevent form submission to Laravel backend

            const username = document.getElementById("username").value;
            const password = document.getElementById("password").value;

            const user = users.find(u => u.username === username && u.password === password);

            if (user) {
                // Store the username in localStorage
                localStorage.setItem("username", user.username);
                window.location.href = ('/'); // Redirect to last page after login
            } else {
                const errorMessage = document.getElementById("errorMessage");
                errorMessage.textContent = "Invalid username or password.";
                errorMessage.classList.remove("hidden");
            }
        });

        // Show/Hide Password Functionality
        const togglePasswordButton = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePasswordButton.addEventListener('click', function () {
            // Toggle the input type between password and text
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;

            // Toggle the button text
            togglePasswordButton.textContent = type === 'password' ? 'Show' : 'Hide';
        });
    </script>
</body>

</html>
