 <template>
  <v-form v-model="valid">
    <v-container>
      <v-row>
        <v-col
          cols="12"
          md="4"
        >
          <v-text-field
            v-model="nome"
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
            v-model="cognome"
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
            v-model="username"
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
            v-model="password"
            label="Password"
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
            v-model="telefono"
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
            v-model="email"
            :rules="emailRules"
            label="E-mail"
            required
          ></v-text-field>
        </v-col>
      </v-row>
        <v-btn class="mr-4" @click="submit">Invia</v-btn>
        <v-btn @click="clear">Cancella</v-btn>

    </v-container>
  </v-form>
</template>

 <script>
  export default {
    data: () => ({
      valid: false,
      nome: '',
      cognome: '',
      username: '',
      password: '',
      telefono: '',
      email: '',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+/.test(v) || 'E-mail must be valid',
      ],
          methods: {
      submit () {
        this.$v.$touch()
      },
      clear () {
        this.$v.$reset()
        this.nome = ''
        this.cognome = ''
        this.username = ''
        this.password = ''
        this.telefono = ''
        this.email = ''
      },
    }
    }),
  }
</script>