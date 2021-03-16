<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li  class="nav-item active" v-for="link in links">
          <a class="nav-link" v-bind:href="link">{{ link }} <span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
    export default {
    name: "navbarComponent",
    data() {
    return {
    links: [
        "Accueil",
      "Annuaire"],
    count: 0
}
}
};
</script>
