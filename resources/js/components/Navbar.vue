<template>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4 shadow p-3 mb-5">
    <div class="container-fluid">
      <a class="navbar-brand">Desafio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <router-link class="nav-link" to="/">Home</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/produtos">Produtos</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/adicionar_produto">Adicionar Produto</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/buscar_produto">Buscar Produto</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/cidades">Cidades</router-link>
          </li>          
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: 'Navbar'
}
</script>
