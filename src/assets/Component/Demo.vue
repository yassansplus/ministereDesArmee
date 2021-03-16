<template>
  <div>
    <h1>Mon petit message {{message}}</h1>
    <button @click="clickMe('EH OH STOP MEC 🥊')">Tu as cliqué {{count}} fois </button>
    <Demo2 @if="count>=5" />
    <span v-if="count>=5">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/6elK8VI1rPs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </span>
  </div>
</template>

<script>
 import Demo2 from "./Demo2";
export default {
  name: "DemoComponent",
  components: {
    Demo2
  },
  methods:{
        clickMe: function(message){
          console.log(this.count);
          this.count++
          this.message = this.count >=5 ?message: this.message;

        }
  },
  data() {
    return {
      message: "test",
      count: 0
    }
  }
};
</script>
