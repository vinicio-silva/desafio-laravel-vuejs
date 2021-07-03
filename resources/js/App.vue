<template>
  <div class="view">
    <Navbar />
    <router-view />
  </div>
</template>

<script>
import Navbar from "./components/Navbar";
export default {
  name: "app",
  components: { Navbar },
};
</script>

<style scoped>
.view {
  height:100%;
  margin:0; 
  padding:0; 
  background: #eeeeee;
}
</style>