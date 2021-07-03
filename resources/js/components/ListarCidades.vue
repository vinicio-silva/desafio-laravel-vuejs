<template>
  <div class="container">
    <h1 class="text-center p-2 mt-5">Cidades</h1>
    <div class="d-flex flex-row justify-content-center">
      <table class="table table-dark mt-5">
        <tbody v-for="cidade in cidades" :key="cidade.cidade">
          <tr>
            <td scope="row" class="text-center">{{ cidade.cidade }}</td>
          </tr>
        </tbody>
      </table>
    </div> 
  </div>
</template>

<script>
export default {
  name: "ListarCidades",
  created() {
    this.loadData();
  },
  methods: {
    loadData() {
      let url = this.url + "/api/getCidades";
      this.axios.get(url).then((response) => {
        this.cidades = response.data;
      });
    },
  },
  mounted() {
    console.log("ListarCidades Mounted");
  },
  data() {
    return {
      url: document.head.querySelector('meta[name="url"]').content,
      cidades: [],
    };
  },
};
</script>

<style scoped>
.table {
  width: 75vh;
  border: 1px solid black;
  box-shadow: 1px 1px 1px black;
}
</style>