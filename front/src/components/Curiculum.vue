<template>
  <!-- <div class="scroller">
    <div class="scroller-pusher"></div>
  </div> -->

  <div class="overlay">
    <!-- 
    <button class="show-more" type="button">
      <span></span>
    </button>
    -->
  </div>

  <div class="headbox">
    <div class="photo"></div>
  </div>

  <div class="littlebox">
    <div class="point">
      <div class="skills-date">
        <div class="dates-cart">
          <div class="current-date">0000</div>
          <div class="next-date">0000</div>
        </div>
      </div>
    </div>
  </div>

  <div class="bigbox">
    <div class="boxcart">
      <template v-for="project in projects.values" :key="project.id">
        <!-- PROJET -->
        <div class="box" :data-date="project.year" data-kw="work" data-tech="front-end">
          <article class="box-inner">
            <header>
              <h2>{{ project.title }}</h2>
              <p>{{ project.year }}</p>
            </header>
            <p>(+ lien web ?)</p>
            <p>(+ visuels ?)</p>
            <p>(+ conditions de travail : encadrement, autonomie, description du rôle)</p>
            <p>{{ project.shortDescription }}</p>
            <h3>Compétences développées</h3>
            <ul v-for="tech in project.technologies" :key="tech">
              <li>{{ tech.name }}</li>
            </ul>
            <div class="plus">
              <p>{{ project.longDescription }}</p>
            </div>
          </article>
        </div>
      </template>
    </div>
  </div>
</template>

<script setup>
import { ref, reactive, onMounted, watch, nextTick } from "vue";
import { ScrollZoomService } from "@js/services/ScrollZoomService.js";

const projects = reactive({
  values: [],
});

onMounted(() => {
  fetch("https://api.skills2025.local/api/projects")
    .then((response) => {
      if (!response.ok) throw new Error("Erreur HTTP " + response.status);
      return response.json();
    })
    .then((data) => {
      projects.values = data.member;
    })
    .catch((error) => {
      console.error("Erreur lors de la récupération des données:", error);
    });
});

watch(projects, async (projects, oldProjects) => {
  await nextTick();
  ScrollZoomService.init();
});

/*
watch(name, (newVal, oldVal) => {
  console.log(`Name changed from ${oldVal} to ${newVal}`);
});
*/

/*
ref() : Pour les valeurs primitives.
reactive() : Pour les objets complexes.
** Accès aux valeurs :
ref: count.value
reactive: accès direct comme user.name.
*/

// const props = defineProps({ projects: Object });
// console.log(props.projects);
/*
const props = defineProps({
  projects: {
    type: Object,
    required: false,
  },
});
*/
</script>
