<template>
  <div class="container p-5">
  <div class="row px-auto">
    <div class="col-md-6 input-group d-table text-left cadastro-form">
      <h1 class="mb-5">Inscreva-se</h1>

      <div>
        <label for="name">Nome completo</label>
        <div class="input-group">
          <input type="text" class="form-control no-border" id="name" aria-describedby="basic-addon3">
        </div>
      </div>
      
      <div>
      <label for="email">Email</label>
      <div class="input-group mb-3">
      <input type="text" class="form-control no-border" id="email" aria-describedby="basic-addon3">
      </div>

      <div>
      <label for="password">Senha</label>
      <div class="input-group mb-3">
      <input type="text" class="form-control no-border" id="password" aria-describedby="basic-addon3">
      </div>

      <div class="buttons d-flex justify-content-between my-auto">
        <button type="button" class="btn btn-link text-muted text-decoration-none" @click="irParaLogin">Já tenho conta</button>
        <button type="button" class="btn btn-black" @click="irParaLogin">Cadastrar</button>
      </div>

      </div>
      </div>
    </div>

    <div class="col-md-6 text-left p-4 bloco">
      <div>
      <h1 class="emoji">🤘</h1>
      </div>

      <div class="text-group">
      <h1>A fortuna fica ao lado daquele que ousa.</h1>
      <h6>Todo progresso ocorre fora da zona de conforto.</h6>
      <img src="../assets/Group 5.svg" alt="">
      </div>
    </div>

  </div>
</div>
</template>

<script>
export default {
  methods: {
    irParaLogin() {
      this.$router.push('/Login');
    },
  },
};
</script>

<style scoped>
.bloco{
  background-color: #f8f9fa;
  color: black;
  transition: 0.5s;
  aspect-ratio: 1/1;
}
.bloco:hover{
  background: black;
}
.bloco:hover .text-group{
  -webkit-filter: invert(100%);
}

.emoji{
  position: relative;
  top: 0;
  transition: 0.5s;
  color: #f8f9fa;
}
.bloco:hover .emoji{
  top: 20px;
}

.text-group{
  padding-top: 25%;
}

.cadastro-form{
  margin: auto;
}

.btn-black{
  background: black;
  color: white;
  width: 171px;
  height: 55px;
  border: none;
  border-radius: 0px;
}

.no-border{
  height: 55px;
  border-radius: 0;
  box-shadow: none;
}
</style>