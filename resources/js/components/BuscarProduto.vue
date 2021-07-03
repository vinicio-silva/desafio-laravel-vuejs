<template>
  <div class="container">
    <h1 class="text-center p-2 mt-5">Buscar um produto</h1>
    <form id="validateForm" @submit.prevent="buscarProduto" enctype="multipart/form-data" >
        <div class="form-group mt-3">
          <label>ID</label>
          <input type="text"  id="id" v-model="produto.id" class="form-control mt-3" placeholder="Digite o id do produto" required>
           <div class="d-flex flex-row justify-content-center">
          <button class="btn btn-primary btn-sm mt-3 mb-3">Buscar</button>
          </div>
        </div>
    </form>
  </div>
</template>

<script>
export default {
  name: "BuscarProduto",
  methods: {
    buscarProduto(){
      let url = this.url + `/api/getProduto/${this.produto.id}`;
      this.axios.get(url).then((response) => {
        this.produto = response.data;
        if(this.produto.id!=null){
          this.$Alerts.showSuccess('Produto encontrado!',response.message);
          this.$router.push({ path: `/resultado_busca/${this.produto.id}` }) 
        } else {
          this.$Alerts.showError('Produto não encontrado',response.message);
        }
      });
    }
  },
  mounted() {
    console.log("BuscarProduto Mounted");
  },
  data() {
    return {
      url: document.head.querySelector('meta[name="url"]').content,
      produto: [],
    };
  },
};
</script>

<style scoped>
  .container {
    width: 75vh;
    margin-top: 10vh;
    border: 0.5px outset black;
    border-radius: 15px;
    box-shadow: 0.5px 0.5px 0.5px black;
    background: white;
 }
</style>