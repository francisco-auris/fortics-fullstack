<template>
<v-container>


  <create-soda />

  <v-row class="mt-5">

    <v-col cols="12">
      <v-text-field
        label="Digite para filtrar"
        solo
        rounded
        background-color="#eee"
        dense
        append-icon="search"
        v-model="filtro"
      ></v-text-field>
    </v-col>
  </v-row>
  <v-row>
    <v-col cols="11">
      <v-btn
      icon
      color="primary"
      :disabled="backPage == null || backPage == 0"
       @click="pushDataList(backPage)"
      >
        <v-icon>arrow_back</v-icon>
      </v-btn>

    </v-col>
     <v-col cols="1">
      <v-btn
      icon
      color="primary"
      :disabled="nextPage == null"
      @click="pushDataList(nextPage)"
      >
        <v-icon>arrow_forward</v-icon>
      </v-btn>

    </v-col>
  </v-row>


  <v-skeleton-loader
    class="mx-auto"
    type="table-tbody"
    v-if="!sodas"
  ></v-skeleton-loader>

  <v-simple-table class="mt-5" v-show="sodas.length > 0">
    <thead>
      <tr>
        <th>Marca</th>
        <th>Sabor</th>
        <th>Tipo</th>
        <th>Litragem</th>
        <th>Estoque</th>
        <th>Valor (unid.)</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="item in filterDatas" :key="item.id">
        <td>{{ item.brand.brand_name }}</td>
        <td>{{ item.flavor }}</td>
        <td>{{ item.type.type_name }}</td>
        <td>{{ item.litigation.value }}</td>
        <td>{{ item.stock }}</td>
        <td>{{ item.value_unit }}</td>
      </tr>
    </tbody>
  </v-simple-table>

</v-container>
</template>
<script>
import { mapGetters } from 'vuex'

import CreateSoda from '@/components/dialog/CreateSoda'

export default {

  components: {
    'create-soda': CreateSoda
  },

  data: () =>({

    filtro: ''

  }),
  created() {
    this.pushDataList();
  },
  computed: {
    ...mapGetters('soda', {
      sodas: 'getList',
      config: 'getAll',
      pageN: 'nextPage',
      pageB: 'backPage'
    }),

    nextPage(){
      let page = this.pageN
      let exp = (page == null) ? null : page.split('=')[1]
      return exp;
    },

    backPage(){
      let page = this.pageB
      let exp = (page == null) ? null : page.split('=')[1]
      return (exp == null) ? null : exp
    },

    filterDatas(){
      if( this.filtro ){
        let regEx = new RegExp(this.filtro.trim(), 'i')
        return this.sodas.filter(p => regEx.test(p.brand.brand_name))
      }else {
        return this.sodas
      }
    }
  },
  methods: {
    pushDataList( page = 1 ){
      this.$store.dispatch('soda/loadSodas', page)
    }
  },

}
</script>
