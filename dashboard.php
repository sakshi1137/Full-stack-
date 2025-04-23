<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard - Beauty & Wellness</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .fade-in {
      animation: fadeIn 1s ease-in forwards;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .glass {
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(15px);
      border: 1px solid rgba(255, 255, 255, 0.3);
    }
  </style>
</head>
<body class="bg-gradient-to-br from-pink-100 via-rose-200 to-fuchsia-100 min-h-screen flex items-center justify-center font-sans">

  <!-- Container -->
  <div class="glass max-w-5xl w-[95%] p-10 rounded-3xl shadow-2xl fade-in">

    <!-- Welcome Header -->
    <div class="text-center mb-10">
      <h1 class="text-5xl font-extrabold text-pink-700 drop-shadow-lg">Hey, <?php echo $_SESSION["user"]; ?>! ✨</h1>
      <p class="text-lg text-gray-700 mt-2">Your personal beauty & wellness zone</p>
    </div>

    <!-- Dashboard Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

      <!-- Profile -->
      <div onclick="activateCard(this)" class="card bg-white rounded-xl p-6 text-center shadow-xl hover:scale-105 transform transition-all cursor-pointer">
        <h2 class="text-xl font-semibold text-pink-700 mb-2">👤 Profile</h2>
        <p class="text-gray-600 mb-4">Manage your details & preferences.</p>
        <a href="profile.html" class="text-pink-500 font-medium hover:underline">Edit Profile</a>
      </div>

      <!-- Services -->
      <div onclick="activateCard(this)" class="card bg-white rounded-xl p-6 text-center shadow-xl hover:scale-105 transform transition-all cursor-pointer">
        <h2 class="text-xl font-semibold text-purple-700 mb-2">💄 Services</h2>
        <p class="text-gray-600 mb-4">Explore beauty and wellness services.</p>
        <a href="services.html" class="text-purple-500 font-medium hover:underline">Browse Services</a>
      </div>

      <!-- Bookings -->
      <div onclick="activateCard(this)" class="card bg-white rounded-xl p-6 text-center shadow-xl hover:scale-105 transform transition-all cursor-pointer">
        <h2 class="text-xl font-semibold text-fuchsia-700 mb-2">📅 Bookings</h2>
        <p class="text-gray-600 mb-4">Manage appointments & schedules.</p>
        <a href="booking.html" class="text-fuchsia-500 font-medium hover:underline">View Bookings</a>
      </div>

    </div>

    <!-- Logout -->
    <div class="mt-10 text-center">
      <button onclick="logoutUser()" class="bg-pink-600 text-white px-6 py-3 rounded-full font-bold hover:bg-pink-700 transition-all shadow-lg">Logout</button>
    </div>
  </div>

  <!-- Floating Greeting Button -->
  <button id="greetBtn" class="fixed bottom-6 right-6 bg-fuchsia-500 text-white p-4 rounded-full shadow-xl hover:bg-fuchsia-600 transition-all transform hover:scale-110">
    🎉
  </button>

  <!-- JS DOM Interactivity -->
  <script>
    function activateCard(card) {
      document.querySelectorAll('.card').forEach(c => c.classList.remove('ring-4', 'ring-pink-400'));
      card.classList.add('ring-4', 'ring-pink-400');
    }

    document.getElementById("greetBtn").addEventListener("click", () => {
      const user = "<?php echo $_SESSION['user']; ?>";
      alert(`Hello ${user} 🌸 Welcome to your gorgeous space!`);
    });

    function logoutUser() {
      if (confirm("Ready to logout, beautiful soul? 😢")) {
        window.location.href = "logout.php";
      }
    }
  </script>
</body>
</html>
