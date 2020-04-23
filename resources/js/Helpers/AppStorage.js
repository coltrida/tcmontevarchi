class AppStorage {
    storeToken(token){
        localStorage.setItem('token', token)
    }

    storeUser(user){
        localStorage.setItem('user', user)
    }

    storeNome(nome){
        localStorage.setItem('nome', nome)
    }

    storeCognome(cognome){
        localStorage.setItem('cognome', cognome)
    }

    storeCredito(credito){
        localStorage.setItem('credito', credito)
    }

    storeStato(stato){
        localStorage.setItem('stato', stato)
    }

    storeEta(eta){
        localStorage.setItem('eta', eta)
    }

    storePrivilegi(privilegi){
        localStorage.setItem('privilegi', privilegi)
    }

    storeCertificato(certificato){
        localStorage.setItem('certificato', certificato)
    }

    storeEmail(email){
        localStorage.setItem('email', email)
    }

    storeAnno(anno){
        localStorage.setItem('anno', anno)
    }

    storeLimite(limite){
        localStorage.setItem('limite', limite)
    }

    store(user, token, nome, cognome, credito, privilegi, certificato, email, anno, eta, stato){
        this.storeToken(token)
        this.storeUser(user)
        this.storeNome(nome)
        this.storeCognome(cognome)
        this.storeCredito(credito)
        this.storePrivilegi(privilegi)
        this.storeCertificato(certificato)
        this.storeEmail(email)
        this.storeAnno(anno)
        this.storeStato(stato)
        this.storeEta(eta)
    }

    clear(){
        localStorage.removeItem('token')
        localStorage.removeItem('user')
    }

    getToken(){
        return localStorage.getItem('token')
    }

    getUser(){
        return localStorage.getItem('user')
    }

    getNome(){
        return localStorage.getItem('nome')
    }

    getCognome(){
        return localStorage.getItem('cognome')
    }

    getCredito(){
        return localStorage.getItem('credito')
    }

    getStato(){
        return localStorage.getItem('stato')
    }

    getEta(){
        return localStorage.getItem('eta')
    }

    getPrivilegi(){
        return localStorage.getItem('privilegi')
    }

    getCertificato(){
        return localStorage.getItem('certificato')
    }

    getEmail(){
        return localStorage.getItem('email')
    }

    getAnno(){
        return localStorage.getItem('anno')
    }

    getLimite(){
        return localStorage.getItem('limite')
    }
}

export default AppStorage = new AppStorage()