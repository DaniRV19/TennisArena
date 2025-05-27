<template>
  <div>

    <!-- Hero Section -->
    <section
      class="parallax bg-[url('https://images.pexels.com/photos/2961964/pexels-photo-2961964.jpeg?cs=srgb&dl=pexels-athena-2961964.jpg&fm=jpg')] h-screen flex items-center justify-center text-white bg-cover bg-center">
      <div class="text-center">
        <h1 class="text-5xl font-bold">Bienvenido a TennisArena</h1>
        <p class="text-xl mt-4">Tu nueva forma de gestionar torneos</p><br>
        <a href="#registro"
          class="bg-lime-500 hover:bg-lime-600 text-white py-2 px-6 rounded-xl shadow-md transition-all">Comenzar</a>
      </div>
    </section>

    <!-- Funcionalidades -->
    <section id="funcionalidades" class="py-16 bg-white">
      <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-3 gap-8 text-center">
        <div>
          <h3 class="text-xl font-bold mb-2">Organización de Torneos</h3>
          <p>Planifica, edita y controla torneos con facilidad.</p>
        </div>
        <div>
          <h3 class="text-xl font-bold mb-2">Dashboard Interactivo</h3>
          <p>Visualiza estadísticas, rankings y gestión de partidos.</p>
        </div>
        <div>
          <h3 class="text-xl font-bold mb-2">Plataforma Intuitiva</h3>
          <p>Diseñada para ofrecer la mejor experiencia de usuario.</p>
        </div>
      </div>
    </section>

    <!-- Por qué elegirnos -->
    <section class="py-16 bg-[#f0efee]">
      <div class="max-w-6xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-10 text-[#30b877]">¿Por qué elegir TennisArena?</h2>
        <div class="grid md:grid-cols-3 gap-8">
          <div class="bg-white shadow-lg p-6 rounded-xl">
            <img src="https://img.icons8.com/color/96/trophy.png" alt="Trofeo" class="mx-auto mb-4">
            <h3 class="text-xl font-semibold mb-2">Enfocado en Torneos</h3>
            <p>Diseñado específicamente para la gestión profesional de torneos de tenis.</p>
          </div>
          <div class="bg-white shadow-lg p-6 rounded-xl">
            <img src="https://img.icons8.com/color/96/combo-chart--v1.png" alt="Estadísticas" class="mx-auto mb-4">
            <h3 class="text-xl font-semibold mb-2">Datos en tiempo real</h3>
            <p>Visualiza resultados, rankings y evolución de jugadores al instante.</p>
          </div>
          <div class="bg-white shadow-lg p-6 rounded-xl">
            <img src="https://img.icons8.com/color/96/multiple-devices.png" alt="Multidispositivo" class="mx-auto mb-4">
            <h3 class="text-xl font-semibold mb-2">Acceso desde cualquier lugar</h3>
            <p>Disponible en ordenador, tablet o móvil sin perder funcionalidad.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonios -->
    <section class="bg-white py-16">
      <div class="max-w-6xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-10 text-[#30b877]">Lo que dicen nuestros usuarios</h2>
        <div class="grid md:grid-cols-3 gap-8">
          <div class="bg-[#ede3d5] p-6 rounded-xl shadow">
            <p class="italic mb-4">"Gracias a TennisArena, organizar torneos ahora es un placer. Todo es rápido y claro."</p>
            <div class="font-bold">Carlos M.</div>
            <div class="text-sm text-gray-500">Entrenador de Club Tenis Norte</div>
          </div>
          <div class="bg-[#ede3d5] p-6 rounded-xl shadow">
            <p class="italic mb-4">"La interfaz es súper intuitiva, y mis jugadores pueden ver sus resultados en tiempo real."</p>
            <div class="font-bold">Lucía R.</div>
            <div class="text-sm text-gray-500">Coordinadora de torneos escolares</div>
          </div>
          <div class="bg-[#ede3d5] p-6 rounded-xl shadow">
            <p class="italic mb-4">"Con esta herramienta hemos duplicado la participación en nuestros eventos."</p>
            <div class="font-bold">Federación Andaluza de Tenis</div>
            <div class="text-sm text-gray-500">Gestor de eventos deportivos</div>
          </div>
        </div>
      </div>
    </section>

    <!-- Registro -->
    <section id="registro" class="py-16 bg-[#8BC34A] text-white text-center">
      <div class="max-w-3xl mx-auto">
        <h3 class="text-2xl font-bold mb-4">¿Listo para jugar?</h3>
        <p class="mb-6">Crea tu cuenta y comienza a gestionar torneos como un profesional.</p>
        <a href="/register" class="bg-white text-[#8BC34A] px-6 py-3 rounded-full font-semibold hover:bg-[#f0efee] transition">
          Registrarse
        </a>
      </div>
    </section>

  </div>
</template>

<script setup>
// No se necesita lógica por ahora
</script>

<style scoped>
/* Si quieres efectos de parallax reales, puedes añadirlos aquí */
</style>
