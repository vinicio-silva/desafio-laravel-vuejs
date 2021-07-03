<template>
<div>
  <div class="container">
   <h1 class="text-center p-2 mt-5">Adicionar Produto</h1>
   <div class="car-body">
     <div class="vol-md-6 offset-md3">
      <form id="validateForm" @submit.prevent="addProduto" enctype="multipart/form-data" >
        <div class="form-group mt-3">
          <label>Código</label>
          <input type="text" id="codProduto" v-model="produto.codProduto" class="form-control mt-3" placeholder="Digite o código do produto" required>
        </div>
        <div class="form-group mt-3">
          <label>Nome</label>
          <input type="text" id="nomeProduto" v-model="produto.nomeProduto" class="form-control mt-3" placeholder="Digite o nome do produto" required>
        </div>
        <div class="form-group mt-3">
          <label>Valor</label>
          <input type="text" id="valorProduto" v-model="produto.valorProduto" class="form-control mt-3" placeholder="Digite o valor do produto" required>
        </div>
        <div class="form-group mt-3">
          <label>Estoque</label>
          <input type="text" id="estoque" v-model="produto.estoque" class="form-control mt-3" placeholder="Digite o estoque do produto" required>
        </div>
        <div class="form-group mt-3">
          <label>Cidade</label>
          <br>
          <select v-model="produto.nomeCidade" class="form-select mt-3" required>
            <option disabled value="">Escolha uma cidade</option>
            <option v-for="cidade in cidades" :key="cidade.cidade">{{ cidade.cidade }}</option>
        </select>
        </div>
        <div class="d-flex flex-row justify-content-center">
          <button class="btn btn-primary mt-4 mb-4">Adicionar</button>
        </div> 
      </form>
      </div>  
   </div>
  </div>
</div>
</template>

<script>
export default {
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
    addProduto() {
      let formData = new FormData();
      formData.append('codProduto',this.produto.codProduto);
      formData.append('nomeProduto',this.produto.nomeProduto);
      formData.append('valorProduto',this.produto.valorProduto);
      formData.append('estoque',this.produto.estoque);
      formData.append('nomeCidade',this.produto.nomeCidade);
      let url = this.url + "/api/addProduto";
      this.axios.post(url,formData).then((response) => {
        if(response.status){
          this.$Alerts.showSuccess('Produto adicionado com sucesso!',response.message);
        } else {
          this.$Alerts.showError('Error',response.message);
        }
      });
    }
  },
  mounted() {
    console.log("AddProduto Mounted");
  },
  data() {
    return {
      url: document.head.querySelector('meta[name="url"]').content,
      cidades: [],
      produto: {},
      codProduto: '',
      nomeProduto: '',
      valorProduto: '',
      estoque: '',
      nomeCidade: '',
    };
  },
}
</script>

<style scoped>
  .container {
    margin-top: 10vh;
    width: 75vh;
    border: 0.5px outset black;
    border-radius: 15px;
    box-shadow: 0.5px 0.5px 0.5px black;
    background: white;
 }
</style>