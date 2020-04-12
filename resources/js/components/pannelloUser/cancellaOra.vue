<template>
    <h1>ora</h1>
</template>

<script>
export default {
    data: () => ({
      
      cancella:{
      username1: '',
      username2: '',
      username3: '',
      username4: '',
      campo: '',
      dataprenotazione: '',
      oraon: '',
      full: '',
      doppio: ''
      },
  created(){
      axios.get('/api/prenotazioni/')
  }  
}
</script>