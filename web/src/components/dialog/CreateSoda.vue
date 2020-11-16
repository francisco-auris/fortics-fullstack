<template>
<div>
    <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
      <template v-slot:activator="{ on, attrs }">
        <v-btn
          color="primary"
          icon
          v-bind="attrs"
          v-on="on"
        >
          <v-icon>add_circle</v-icon>
        </v-btn>
      </template>
      <v-card>
        <v-toolbar dark color="black">
          <v-btn icon dark @click="dialog = false">
            <v-icon>close</v-icon>
          </v-btn>
          <v-toolbar-title>Cadastro de refrigerantes</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn dark text @click="handleSubmit()" >Salvar</v-btn>
          </v-toolbar-items>
        </v-toolbar>

        <v-container>

            <v-row>
                <v-col sm="4">
                  <v-combobox
                    label="Marca"
                    v-model="dados.brand_id"
                    :error-messages="errors.brand_id"
                  ></v-combobox>
                    <!--<v-text-field
                        label="Nome completo"
                        type="text"
                        v-model="dados.name"
                        :error-messages="errors.name"
                    />-->
                </v-col>
                <v-col sm="4">
                    <v-text-field
                        label="Sabor"
                        type="text"

                        v-model="dados.flavor"
                        :error-messages="errors.flavor"
                    />
                </v-col>
                <v-col sm="4">
                  <v-combobox
                    label="Litragem"
                    v-model="dados.litigation_id"
                    :error-messages="errors.litigation_id"
                  ></v-combobox>
                    <!--<v-text-field
                        label="CPF"
                        type="text"
                        v-model="dados.cpf"
                        :error-messages="errors.cpf"

                    />-->
                </v-col>
            </v-row>
            <v-row>
            <v-col sm="4">
                  <v-combobox
                    label="Tipo"
                    v-model="dados.type_id"
                    :error-messages="errors.type_id"
                  ></v-combobox>
                    <!--<v-text-field
                        label="CPF"
                        type="text"
                        v-model="dados.cpf"
                        :error-messages="errors.cpf"

                    />-->
                </v-col>
                <v-col sm="3">
                    <v-text-field
                        label="Em estoque"
                        type="number"

                        v-model="dados.stock"
                        :error-messages="errors.stock"
                    />
                </v-col>
                <v-col sm="3">
                  <label>Valor unitário</label>
                  <money v-model="dados.value_unit" v-bind="money" class="money"></money>

                </v-col>

            </v-row>
{{ errors }}
        </v-container>

      </v-card>

    </v-dialog>


</div>
</template>
<script>
import { mapGetters } from 'vuex'
import {Money} from 'v-money'

export default {
    components: {
      Money
    },
    data: () => ({
        dados: {},
        dialog: false,
        notifications: false,
        sound: true,
        widgets: false,
        errors: [],
        subtmit: false,
        money: {
          decimal: ',',
          thousands: '.',
          prefix: 'R$ ',
          suffix: '',
          precision: 2,
          masked: false
        }
    }),
    mounted(){

    },
    computed: {

    },
    methods: {
        handleSubmit(){
          this.$store.dispatch('soda/create', this.dados)
            .then(res => {
              if( res.status == 200 ){
                this.dados = {}
                this.dialog = false
              }
            })
            .catch(err => {
              if( err.data.status == 'validate' ){
                this.errors = err.data.data
              }else {
                alert('Erro ao tentar criar novo refrigerante, tente novamente ou entre em contato com a TI :)');
              }

              console.error('Erro create employe', err.data)
            })
        }
    }
}
</script>
<style scoped>
.money {
    width: 100%;
    height: 35px;
    border: solid 1px #aaa;
    padding-left: 10px;
    border-radius: 3px;
}
</style>
