<template>
    <div class="row">
        
        <div v-for="(tarefa, index) in tarefas" :key="index" class="list-group-item list-group-item-action d-inline-flex">
            <div class="col-md-1">
                <input type="checkbox" v-model="tarefa.isChecked" @change="syncSubtarefaCheckboxes(tarefa)">
            </div>
         <div class="col-md-10"> 
         <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1"  >{{ tarefa.titulo }}</h5>

          <div>
          <small class="text-muted"></small>
          </div>

          </div>
          <div>
            <div class="d-flex w-100 justify-content-between">
          <p class="mb-1">{{ tarefa.descricao }}</p>
            <div class="d-inline">
            <form @click="editTarefa(tarefa)" class="d-inline"><button type="submit" class="btn btn-success mb-2"><img src="../assets/Sino.svg"></button></form>
            <form @click="editData(tarefa)" class="d-inline"><button type="submit" class="btn btn-primary mb-2"><img src="../assets/Entrada.svg" alt=""></button></form>
            <form class="d-inline" @submit.prevent="deleteTarefa(tarefa.id)"><button type="submit" class="btn btn-danger mb-2"><img src="../assets/Calendario.svg"></button></form>
            </div>
          </div>
          <div>
            <ul>
            <p v-for="(subtarefa, subIndex) in tarefa.subtarefas" :key="subIndex"><input type="checkbox" v-model="subtarefa.isChecked"> {{ subtarefa.titulo }} {{ subtarefa.titulo }}</p>
            </ul>
          </div>
        </div>
        <p v-html="formatDataVencimento(tarefa.data_vencimento)"></p>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div>
    
</div>
        
    </div>
  </template>
  
  <script>
  
  export default {
    name: "get-tarefas",
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
      irParaTarefasHoje() {
        this.$router.push('/tarefas-hoje');
      },
      formatDataVencimento(dateString) {
      const date = new Date(dateString);
      const currentDate = new Date();
      
      if (date.toDateString() === currentDate.toDateString()) {
        return '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="17" viewBox="0 0 15 17" fill="none"><path d="M10.3889 1V3.88889M4.61111 1V3.88889M1 6.77778H14M2.44444 2.44444H12.5556C13.3533 2.44444 14 3.09114 14 3.88889V14C14 14.7977 13.3533 15.4444 12.5556 15.4444H2.44444C1.6467 15.4444 1 14.7977 1 14V3.88889C1 3.09114 1.6467 2.44444 2.44444 2.44444Z" stroke="black" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/> </svg><span style="color:green;"> Hoje<span>';
      } else if (date < currentDate) {
        const options = { day: '2-digit', month: '2-digit', year: 'numeric' };
        return `<svg xmlns="http://www.w3.org/2000/svg" width="15" height="17" viewBox="0 0 15 17" fill="none">
        <path d="M10.3889 1V3.88889M4.61111 1V3.88889M1 6.77778H14M2.44444 2.44444H12.5556C13.3533 2.44444 14 3.09114 14 3.88889V14C14 14.7977 13.3533 15.4444 12.5556 15.4444H2.44444C1.6467 15.4444 1 14.7977 1 14V3.88889C1 3.09114 1.6467 2.44444 2.44444 2.44444Z" stroke="black" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
        </svg> <span style="color: red;">${date.toLocaleDateString('pt-BR', options)}</span>`;
      } else {
        return `<svg xmlns="http://www.w3.org/2000/svg" width="15" height="17" viewBox="0 0 15 17" fill="none">
        <path d="M10.3889 1V3.88889M4.61111 1V3.88889M1 6.77778H14M2.44444 2.44444H12.5556C13.3533 2.44444 14 3.09114 14 3.88889V14C14 14.7977 13.3533 15.4444 12.5556 15.4444H2.44444C1.6467 15.4444 1 14.7977 1 14V3.88889C1 3.09114 1.6467 2.44444 2.44444 2.44444Z" stroke="black" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
        </svg> <span>${date.toLocaleDateString('pt-BR')}</span>`;
      }
    },
    syncSubtarefaCheckboxes(tarefa) {
            const isChecked = tarefa.isChecked;
            for (const subtarefa of tarefa.subtarefas) {
                subtarefa.isChecked = isChecked;
            }
        },
        async deleteTarefa(tarefaId) {
      try {
        const response = await fetch(`http://localhost:8000/api/tarefas/${tarefaId}`, {
          method: 'DELETE',
        });

        if (response.status === 204) {
          this.tarefas = this.tarefas.filter((tarefa) => tarefa.id !== tarefaId);
        } else {
          console.error('Failed to delete tarefa');
        }
      } catch (error) {
        console.error('Error while deleting tarefa', error);
      }
    },
    async editData(tarefa) {
      try {
        const newDataVencimento = prompt('Enter new data_vencimento (YYYY-MM-DD):', tarefa.data_vencimento);

        if (newDataVencimento === null) {
          return;
        }

        const response = await fetch(`http://localhost:8000/api/tarefas/${tarefa.id}`, {
          method: 'PUT',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({ data_vencimento: newDataVencimento }),
        });

        if (response.status === 200) {
          tarefa.data_vencimento = newDataVencimento;
        } else {
          console.error('Failed to update tarefa data_vencimento');
        }
      } catch (error) {
        console.error('Error while editing tarefa data_vencimento', error);
      }
    },
    async editTarefa(tarefa) {
      try {
        const newTitulo = prompt('Enter new titulo:', tarefa.titulo);
        const newDescricao = prompt('Enter new descricao:', tarefa.descricao);

        if (newTitulo === null || newDescricao === null) {
          return;
        }

        const response = await fetch(`http://localhost:8000/api/tarefas/${tarefa.id}`, {
          method: 'PUT',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({ titulo: newTitulo, descricao: newDescricao }),
        });

        if (response.status === 200) {
          tarefa.titulo = newTitulo;
          tarefa.descricao = newDescricao;
        } else {
          console.error('Failed to update tarefa titulo and descricao');
        }
      } catch (error) {
        console.error('Error while editing tarefa titulo and descricao', error);
      }
    }
      
    }
  };
  </script>

  <style scoped>

  </style>
  