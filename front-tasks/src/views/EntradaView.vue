<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand">🤘</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto d-flex justify-content-around">
      <li class="nav-item">
        <img class="nav-link" src="../assets/NovaTarefa.svg" alt="">
      </li>
      <li class="nav-item">
        <img class="nav-link" src="../assets/Interrogacao.svg" alt="">
      </li>
      <li class="nav-item">
        <img class="nav-link" src="../assets/Sino.svg" alt="">
      </li>
      <li class="nav-item">
        <img class="nav-link" src="../assets/Perfil.svg" alt="">
      </li>
    </ul>
  </div>
</nav>
    <div class="row">
      <div class="col-md-3 pt-4 vh-100 bg-light list-group">
        <div class="text-left pl-5 d-table">
        <button type="button" class="btn btn-link list-group-item-action" @click="irParaEntrada"><img src="../assets/Entrada.svg"> Entrada</button>
        <button type="button" class="btn btn-link list-group-item-action" @click="irParaTarefasHoje"><img src="../assets/Calendario.svg"> Tarefas de Hoje</button>
        <button type="button" class="btn btn-link list-group-item-action"><img src="../assets/Vencida.svg"> Tarefas Vencidas</button>
        </div>
      </div>
  
      <div class="col-md-6 input-group d-table text-left p-4">
        <h1>Entrada</h1>
        <div >
          <tarefas/>
        </div>
        
      </div>
    </div>


  </div>
  
  </template>
  
  <script>
  import Tarefas from "@/components/Tarefas.vue";
  
  export default {
    name: "get-tarefas",
    components: {
      Tarefas
    },
    data() {
      return {
        tarefas: []
      };
    },
    async mounted() {
      await this.fetchTarefas();
    },
    methods: {
      async fetchTarefas() {
        const response = await fetch("http://localhost:8000/api/tarefas");
        const data = await response.json();
        this.tarefas = data;
      },
      irParaCadastro() {
        this.$router.push('/cadastro');
      },
      irParaTarefasHoje() {
        this.$router.push('/tarefas-hoje');
      }
    }
  };
  </script>
  
  <style scoped>
  .modal {
  position: fixed;
  z-index: 999;
  top: 20%;
  left: 50%;
  width: 300px;
  margin-left: -150px;
}
  </style>