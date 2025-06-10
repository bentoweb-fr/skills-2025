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
      <div class="box" data-date="2007" data-kw="work" data-tech="front-end">
        <div class="box-inner">
          <h2>Silvernet</h2>
          <h3>2007 - 2010</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum cumque reiciendis voluptatibus vero facilis quasi debitis, perspiciatis beatae quidem suscipit alias omnis asperiores nesciunt quod, id optio amet nam vel.</p>
          <h3>Compétences développées</h3>
          <ul>
            <li>JavaScript</li>
            <li>CSS</li>
            <li>HTML<s>5</s></li>
          </ul>
        </div>
      </div>

      <div class="box" data-date="2011" data-kw="pro web" data-tech="cms front-end">
        <div class="box-inner">
          <h2>Altimax</h2>
          <h3>2011 - 2013</h3>
          <p>Je découvre le concept de CMS avec Joomla et je suis initié au MVC.</p>
          <p>Je continue principalement mon travail sur le front-end et je commence à découvrir le principe de CSS responsive.</p>
          <h3>Compétences développées</h3>
          <ul>
            <li>JavaScript</li>
            <li>CSS</li>
          </ul>
        </div>
      </div>

      <div class="box" data-date="2013" data-kw="pro web" data-tech="cms wordpress front-end nodejs">
        <div class="box-inner">
          <h2>Reputation Squad</h2>
          <h3>2013 - 2016</h3>
          <p>Je rejoins l'antenne rennaise de cette entreprise parisienne et j'y apprends WordPress et le développement de thèmes sur-mesure.</p>
          <div class="plus">
            <p>La philosophie est de viser les meilleures performances possibles en s'évitant la lourdeur des thèmes trop polyvalents, et de permettre une gestion simple du contenu.</p>
            <p>Je développe ma connaissance des outils de build CSS et JS (minification, concaténation) et le SASS.</p>
            <p>Je fais fortement évoluer ma pratique et ma connaissance de l'interface responsive.</p>
            <p>Je découvre également l'approche UX.</p>
          </div>
        </div>
      </div>

      <div class="box" data-date="2018" data-kw="pro web" data-tech="cms front-end back-end">
        <div class="box-inner">
          <h2>Addviso</h2>
          <h3>2018 - 2019</h3>
          <p>Je rejoins l'agence rennaise pour du WordPress et du Drupal. Je nourris mes connaissance en bonnes pratiques front et back, et j'applique les concepts MVC.</p>
        </div>
      </div>

      <div class="box" data-date="2020" data-kw="pro photo" data-tech="photography">
        <div class="box-inner">
          <h2>Cyru.fr</h2>
          <p>Dans une période de ralentissement de mon activité, j'y ai vu l'opportunité d'explorer un autre de mes centes d'intérêt et de me plonger entièrement dans la photographie pendant quelques mois.</p>
          <div class="plus">
            <p>Je partais quasiment de rien. J'avais à peine entendu parler du principe de triangle d'exposition. Je me suis donc mis en quête d'un maximum de ressources et de connaissances simplement et librement accessibles, en commençant par une dizaine de chaînes Youtube de vulgarisation par des photographes très sympathiques.</p>
          </div>
        </div>
      </div>

      <div class="box" data-date="2021" data-kw="pro web" data-tech="cms wordpress front-end">
        <div class="box-inner">
          <h2>bentoweb.fr v1</h2>
          <p>Je construit ma présence en ligne à travers un site à la navigation atypique mais simple. C'est l'occasion de voir si je peux proposer une expérience différente tout en respectant les bonnes pratiques de performance, de compatibilité et d'UX.</p>
        </div>
      </div>

      <div class="box" data-date="2022" data-kw="pro web" data-tech="cms wordpress front-end">
        <div class="box-inner">
          <h2>L’Orchestre National de Bretagne <br />onb.fr</h2>
          <p>Dans le cadre de modernisation de son image, l’Orchestre National de Bretagne a besoin d’un site internet moderne, pour toucher également les jeunes générations. L’interface est construite sur mesure d’après un design créatif et reflétant les axes de communication de l’ONB. Il faut également intégrer de nombreux médias : photos, vidéos, podcasts et autres contenus propres à l’univers de la musique. De plus, un accès privé doit être mis à disposition des musiciens.</p>
          <div class="plus">
            <p>Le besoin en gestion autonome du contenu est parfaitement en adéquation avec un WordPress, sur lequel un thème sur-mesure est implanté de manière à fournir notamment de bonnes performances SEO.</p>
            <h3>Objectif 1 : Le SEO</h3>
            <p>Le terme “ONB” est utilisé par bien d’autres organismes. Il faut donc gagner suffisamment de points pour ressortir dans les premiers résultats sur cette expression de recherche.</p>
            <p>Pour y parvenir, plusieurs méthodes sont en oeuvre :</p>
            <ul>
              <li>Les microdata schema.org</li>
              <li>Un responsive efficace</li>
              <li>Un site performant</li>
              <li>Une mise à jour régulière avec du contenu pertinent</li>
              <li>Une construction HTML respectueuse des bonnes pratiques</li>
            </ul>
            <h3>Objectif 2 : Les médias</h3>
            <p>Intégrer une certaine variété de médias de façon harmonieuse peut présenter quelque défi.</p>
            <h3>Objectif 3 : L’accès privé</h3>
            <p>l faut permettre de sécuriser l’accès à certains contenus du site tout en conservant de la simplicité et de la légèreté. Mettre un mot de passe devant une page web ne suffit pas. Il faut également sécuriser les liens vers les documents, par exemple des PDF, qui pourraient se retrouver transmis par le web ou référencés par des moteurs de recherche.</p>
            <h3>Objectif 4 : La mise en page particulière</h3>
            <p>Le design graphique présente des caractéristiques inédites de défilements synchonisés, d’éléments fixes chevauchant d’autres mobiles, des niveaux de transparence, qui peuvent compliquer le travail d’un développeur front lorsqu’il s’attaque aux parties cliquables, les niveaux de z-index et les conséquences en responsive.</p>
            <h3>Peut mieux faire</h3>
            <p>
              Les médias<br />
              Bien que l’intégration soit plutôt satisfaisante, des éléments d’UI pourraient améliorer l’expérience utilisateur.
            </p>
          </div>
        </div>
      </div>

      <div class="box" data-date="2022" data-kw="pro web" data-tech="symfony front-end back-end vuejs cicd">
        <div class="box-inner">
          <h2>E-commerce Sterenn</h2>
          <p>Je suis recruté directement par le client final qui souhaite s’approprier le site e-commerce développé par une agence, afin de le maintenir et le faire évoluer en interne. Cette stratégie est clairement définie dès le départ, et l’agence doit former les développeurs pour cet objectif.</p>
          <div class="plus">
            <p>Sterenn est un groupe qui mise sur ses filiales B2B spécialisées pour faire bénéficier à ses clients d’expertises dans le domaine du matériel et de la pièce mécanique agricole, et tout ce qui gravite un peu autour de l’équipement de jardinage, paysagisme…</p>
            <p>Chaque filiale doit posséder son propre site e-commerce, chacun basé sur une plateforme commune.</p>
            <h3>Objectif 1 : La tech stack</h3>
            <p>Cette nouvelle mission est l’un de mes plus grands défi, déjà par le fait que je connais peu ou pas du tout la majorité des outils utilisés :</p>
            <ul>
              <li>Symfony et tout son écosystème</li>
              <li>Vue</li>
              <li>Bootstrap</li>
              <li>PostgreSQL</li>
              <li>Linux (Ubuntu)</li>
              <li>VSCode</li>
              <li>Docker</li>
              <li>Ansible</li>
              <li>CI/CD Gitlab</li>
              <li>Tests automatisés</li>
            </ul>
            <p>J’apporte bien sûr mon expérience et ma connaissance général du web, mais ma montée en compétence sur la plupart des outils prend du temps. Je complète donc les formations déjà prévues par d’autres formations qui me semblent utiles, comme la reprise des bases sur la POO en PHP et l’autoloading de classes, et globalement à propos de tous les outils de la liste.</p>
            <p>J’en profite aussi pour m’initier aux principes DevOps et je travaille sur des petits projets en parallèle pour mieux m’approprier toutes ces notions.</p>
            <h3>Objectif 2 : L’historique de l’entreprise</h3>
            <p>Toute l’orientation technique e-commerce s’articule autour des processus et principes déjà utilisés par l’entreprise et ses filiales. Le nombre des filiales spécialisées et la grande variété de références en fait un monde à s’approprier bien plus riche et complexe que tous mes projets précédents.</p>
            <h3>Objectif 3 : Le mental</h3>
            <p>Se retrouver en partie responsable de la maintenance et de l’évolution d’un e-commerce générant un tel volume de ventes met une certaine pression lorsqu’on se considère encore “novice” sur certaines des technologies utilisées. Il est alors important de connaître ses limites et d’avoir une certaine conscience de sa propre progression.</p>
          </div>
        </div>
      </div>

      <div class="box" data-date="2024" data-kw="pro web" data-tech="front-end back-end vuejs nodejs cicd">
        <div class="box-inner">
          <h2>Tasks</h2>
          <p>Tasks est un side project destiné autant à expérimenter et monter en compétences qu'à proposer une solution d'organisation maison pour la gestion de projet et de tâches au plus proche de nos besoins en interne, sans dépenser des milliers d'euros par an en abonnement Monday, Wrike ou autre.</p>
          <div class="plus">
            <p>Un des objectif est de construire une application qui peut fonctionner sans devoir recharger la page pour voir les modifications par les autres utilisateurs, tout ça en temps réel. Techniquement, ça se traduit par un back Node et un front Vue, avec une communication principalement par websockets.</p>
            <p>L'interface doit rester aussi simple que possible et limitée aux fonctionnalités utilisées.</p>
            <p>Une des particularités notables est certainement la distinction entre les tickets de demandes et les tickets de production.</p>
          </div>
        </div>
      </div>

      <div class="box" data-date="2024" data-kw="perso web" data-tech="front-end back-end vuejs symfony">
        <div class="box-inner">
          <h2>bentoweb.fr v2</h2>
          <p>Pour faire d'une pierre deux coups, je profite du besoin de rafraîchir ma présence en ligne pour mettre en oeuvre une stack technique qui m'intéresse et pour laquelle je peux m'appuyer sur mes avancées de ces dernières années.</p>
          <div class="plus">
            <p>Je mets donc en place un site headless avec Vue+Vite, relié à un Symfony via API.</p>
            <p>C'est aussi l'occasion de mettre en place mon premier "vrai" serveur maison pour héberger mes sites et applications, et me défaire de mes abonnements OVH et Gandi. Je consolide donc mon profil "full stack" en ayant une certaine compréhension et une certaine maîtrise (toute relative, j'en ai bien conscience) de la stack web globale.</p>
            <p>Kubernetes est sur ma TODO, mais c'est certainement prématuré et pas forcément pertinent pour le moment.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({ projects: Object });
console.log(props.projects);
</script>
