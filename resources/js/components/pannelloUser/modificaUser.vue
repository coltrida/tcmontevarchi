 <template>
  <v-form v-model="valid">
    <v-container>
      <v-row>
        <v-col
          cols="12"
          md="4"
        >
          <v-text-field
            v-model="form.nome"
            label="Nome"
            required
          ></v-text-field>
        </v-col>
        </v-row>
        <v-row>
        <v-col
          cols="12"
          md="4"
        >
          <v-text-field
            v-model="form.cognome"
            label="Cognome"
            required
          ></v-text-field>
        </v-col>
        </v-row>
        <v-row>
        <v-col
          cols="12"
          md="4"
        >
          <v-text-field
            v-model="form.username"
            label="Username"
            required
          ></v-text-field>
        </v-col>
        </v-row>
        <v-row>
        <v-col
          cols="12"
          md="4"
        >
          <v-text-field
            v-model="form.amici"
            label="Amici"
            required
          ></v-text-field>
        </v-col>
        </v-row>
        <v-row>
        <v-col
          cols="12"
          md="4"
        >
          <v-text-field
            v-model="form.telefono"
            label="Telefono"
            required
          ></v-text-field>
        </v-col>
        </v-row>
        
         <v-btn class="mr-4 success" @click="submit">Invia</v-btn>
        

    </v-container>
  </v-form>
</template>

 <script>
  export default {
    data: () => ({
      valid: false,
      form:{
      nome: '',
      cognome: '',
      username: '',
      amici: '',
      certificato: '',
      telefono: '',
      
      },
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+/.test(v) || 'E-mail must be valid',
      ],
    }),
    created(){
        axios.post("/api/auth/me").then(res => {
            this.form = res.data
            console.log(this.form);
 })
},
    methods: {
      submit () {
        axios.patch("/api/auth/update/"+this.form.id,
         this.form)
        .then(res =>{
         this.$router.push('/')   
        })
      },
      clear () {
             }
    }
    }
  
</script>