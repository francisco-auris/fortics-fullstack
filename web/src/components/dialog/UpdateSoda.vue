<template>
<div>
    <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
      <template v-slot:activator="{ on, attrs }">
        <v-btn
          color="primary"
          icon
          v-bind="attrs"
          v-on="on"
          v-show="idsoda != null"
        >
          <v-icon>edit</v-icon>
        </v-btn>
      </template>
      <v-card>
        <v-toolbar dark color="black">
          <v-btn icon dark @click="close()">
            <v-icon>close</v-icon>
          </v-btn>
          <v-toolbar-title>Editar refrigerantes</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn dark text @click="handleSubmit()" :loading="loading" :disabled="visibleSubmit" >Salvar</v-btn>
          </v-toolbar-items>
        </v-toolbar>

        <v-container>

            <v-row>
              <v-col cols="12">
                <v-skeleton-loader
                  class="mx-auto mt-5"
                  type="paragraph"
                  v-show="false"
                ></v-skeleton-loader>
              </v-col>
            </v-row>

            <v-row>
                <v-col sm="4">
                  <v-select
                    label="Marca"
                    :items="brands"
                    item-value="id"
                    item-text="brand_name"
                    v-model="dados.brand_id"
                    :error-messages="errors.brand_id"
                  ></v-select>
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
                  <v-select
                    label="Litragem"
                    :items="litigations"
                    item-value="id"
                    item-text="value"
                    v-model="dados.litigation_id"
                    :error-messages="errors.litigation_id"
                  ></v-select>
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
                  <v-select
                    label="Tipo"
                    :items="types"
                    item-value="id"
                    item-text="type_name"
                    v-model="dados.type_id"
                    :error-messages="errors.type_id"
                  ></v-select>
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
            
        </v-container>
  
      </v-card>

    </v-dialog>


</div>
</template>
<script>
import { mapGetters } from 'vuex'
import {Money} from 'v-money'

export default {
    props: [
        'idsoda'
    ],
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
        loading: false,
        money: {
          decimal: ',',
          thousands: '.',
          prefix: 'R$ ',
          suffix: '',
          precision: 2,
          masked: false
        }
    }),
    created(){
      
    },
    mounted(){
      //call push load types
      this.$store.dispatch('type/loadTypes')
      //call push load litigations
      this.$store.dispatch('litigation/loadLitigations')
      //call push load brands
      this.$store.dispatch('brand/loadBrands')
    },
    watch: {
        idsoda: function(val){
            if( val != null ){
                 const fx = this.$store.getters['soda/getSoda']
                this.dados = fx(val)
            }
           
        }
    },
    computed: {
      ...mapGetters({
        types: 'type/getAll',
        litigations: 'litigation/getAll',
        brands: 'brand/getAll'
      }),
      visibleSubmit(){
            if(
                this.dados.flavor &&
                this.dados.type_id &&
                this.dados.litigation_id &&
                this.dados.brand_id &&
                this.dados.value_unit &&
                this.dados.stock 
            ){
                //console.log('liberado')
                return false
            }else {
                //console.log('pendente')
                return true
            }
        }
    },
    methods: {
        async handleSubmit(){
          this.loading = true
          let data = this.dados
            data['_method'] = 'PUT'
            data['id'] = this.idsoda

          await this.$store.dispatch('soda/update', data)
                .then(res => {
                if( res.status == 200 ){
                    this.dados = {}
                    this.dialog = false
                    alert("Refrigerante atualizado com sucesso.");
                }
                })
                .catch(err => {
                if( err.data.status == 'validate' ){
                    this.errors = err.data.data
                }else {
                    alert(err.data.message);
                }

                console.error('Erro update refri', err.data)
                })
          this.loading = false
        },

        close(){
            this.dados = {}
            this.dialog = false
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
