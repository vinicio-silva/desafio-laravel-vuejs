<template>
  <div class="container">
    <h1 class="text-center p-2 mt-5">Produtos</h1>
    <table class="table table-dark mt-5">
  <thead>
    <tr>
      <th scope="col" class="text-center">ID</th>
      <th scope="col" class="text-center">CÓDIGO</th>
      <th scope="col" class="text-center">NOME</th>
      <th scope="col" class="text-center">VALOR</th>
      <th scope="col" class="text-center">ESTOQUE</th>
      <th scope="col" class="text-center">CIDADE</th>
      <th scope="col" class="text-center">EDITAR</th>
      <th scope="col" class="text-center">DELETAR</th>
    </tr>
  </thead>
  <tbody v-for="produto in produtos" :key="produto.id">
    <tr>
      <td scope="row" class="text-center">{{ produto.id }}</td>
      <td scope="row" class="text-center">{{ produto.codProduto }}</td>
      <td scope="row" class="text-center">{{ produto.nomeProduto }}</td>
      <td scope="row" class="text-center">{{ produto.valorProduto }}</td>
      <td scope="row" class="text-center">{{ produto.estoque }}</td>
      <td scope="row" class="text-center">{{ produto.nomeCidade }}</td>
      <td scope="row" class="text-center"><router-link :to="{name:'/editar_produto', params: {id:produto.id}}" class="btn btn-primary btn-sm">Editar</router-link></td>
      <td scope="row" class="text-center" @click.prevent="deleteProduto(produto.id)"><button class="btn btn-danger btn-sm">Deletar</button></td>
    </tr>
  </tbody>
</table>
  </div>
</template>

<script>
export default {
  name: "ListarProdutos",
  created() {
    this.loadData();
  },
  methods: {
    loadData() {
      let url = this.url + "/api/getProdutos";
      this.axios.get(url).then((response) => {
        this.produtos = response.data;
      });
    },
    deleteProduto(id){
      let url = this.url +`/api/deleteProduto/${id}`;
      this.axios.delete(url).then((response) => {
        if(response.status){
          this.loadData();
          this.$Alerts.showSuccess('Produto deletado com sucesso!',response.message);
        } else {
          this.$Alerts.showError('Error',response.message);
        }
      });
    }
  },
  mounted() {
    console.log("ListarProdutos Mounted");
  },
  data() {
    return {
      url: document.head.querySelector('meta[name="url"]').content,
      produtos: [],
    };
  },
};
</script>

<style scoped>
.table {
  border: 1px solid black;
  box-shadow: 1px 1px 1px black;
}
</style>