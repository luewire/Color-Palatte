<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Palette</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            top: calc(100% + 8px); /* Position below the profile icon */
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

<body class="bg-gray-50 text-gray-800"> <header class="navbar fixed w-full top-0 z-50 bg-gradient-to-r from-gray-900 via-gray-800 to-gray-700 py-4 shadow-md"> <div class="container mx-auto flex justify-between items-center"> <div class="logo flex items-center"> <img src="images/image.png" alt="Logo" class="w-11 h-11 object-cover rounded-full mr-3"> <h1 class="text-2xl font-bold text-white">Color Palette</h1> </div> <nav class="relative"> <div id="user-info" class="flex items-center relative"> <!-- Profile Image --> <img id="profile-icon" src="images/user.png" alt="Profile Icon" class="h-8 w-8 rounded-full cursor-pointer hidden"> <div id="dropdown" class="dropdown-content"> <p id="greeting-text"></p> <a id="logout-link" href="#" onclick="confirmLogout()">Logout</a> </div> <a id="login-link" href='auth-login' class="text-blue-500 font-bold ml-4 hidden">Login</a> </div> </nav> </div> </header>

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

    <section id="home" class="hero flex items-center justify-center text-center h-screen bg-[url('images/color-desktop-wallpaper-1.jpg')] bg-cover bg-center px-5">
        <div class="container mx-auto bg-white bg-opacity-80 p-8 rounded-lg shadow-lg">
            <h2 class="text-4xl md:text-6xl font-bold text-gray-800 mb-4">Find Your Color!</h2>
            <p class="text-lg md:text-2xl text-gray-700 mb-6">Discover the perfect color palette for your project.</p>
            <a href="/home" class="btn bg-red-500 text-white px-6 py-3 rounded-md hover:bg-red-600 transition duration-300">Find Now</a>
        </div>
    </section>
</body>

</html>
