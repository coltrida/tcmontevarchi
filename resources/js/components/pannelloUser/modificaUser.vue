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
        <v-row>
        <v-col
          cols="12"
          md="4"
        >
          <v-text-field
            v-model="form.email"
            :rules="emailRules"
            label="E-mail"
            required
          ></v-text-field>
        </v-col>
      </v-row>
         <v-btn class="mr-4 success" @click="submit">Invia</v-btn>
        <v-btn class="primary" @click="clear">Cancella</v-btn>

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
      email: '',
      },
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+/.test(v) || 'E-mail must be valid',
      ],
    }),
    created(){
        axios.post("/api/auth/me").then(res => {
<<<<<<< HEAD
            // console.log(res.data);
            
            // this.form.cognome = res.data.cognome
            // this.form.username = res.data.username
            // this.form.amici = res.data.amici
            // this.form.telefono = res.data.telefono
            // this.form.email= res.data.email
=======
>>>>>>> 4d8c2d7e4e6325282496f41ca4465cb7af1347c1
            this.form = res.data
            console.log(this.form);
            
            
        })

    },
    methods: {
      submit () {
        //this.$v.$touch()
<<<<<<< HEAD
        axios.patch('/api/auth/update/'+this.form.id,
         this.form
        )
=======
        axios.patch("/api/auth/update/"+this.form.id,
         this.form)
>>>>>>> 4d8c2d7e4e6325282496f41ca4465cb7af1347c1
        .then(res =>{
         this.$router.push('/')   
        })
      },
      clear () {
       // this.form.$v.$reset()
        this.form.nome = ''
        this.form.cognome = ''
        this.form.username = ''
        this.form.amici = ''
        this.form.telefono = ''
        this.form.email = ''
      }
    }
    }
  
</script>