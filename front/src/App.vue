<template>
  <Curiculum />
  <!-- <Curiculum :projects="projects" /> -->
</template>

<script lang="ts" setup>
/**
 * CV interactif
 * CGV en tant que freelance
 * Liste de tous les services (web, photo, conseil + niveau de maîtrise)
 *
 * Rassurer : Comment ça se déroule, du début à la fin ?
 * Informer : Ce qui guide un choix technique
 */

import { ref, onMounted } from "vue";
import Curiculum from "./components/Curiculum.vue";

// import HelloWorld from "./components/HelloWorld.vue";

// document.title = "Look Ma!";
// setup(() => {
// console.log("HelloWorld");
// console.log(HelloWorld);
// document.title = "Look Ma!";

// const projects = ref([]);
/*
onMounted(() => {
  fetch("https://api.skills2025.local/api/projects")
    .then((response) => {
      if (!response.ok) throw new Error("Erreur HTTP " + response.status);
      // projects.values = response.json();
      return response.json();
    })
    .then((data) => {
      console.log("Données reçues:", data);
      projects.value = data.member;
    })
    .catch((error) => {
      console.error("Erreur lors de la récupération des données:", error);
    });
});
*/
// defineProps(['title'])
</script>
