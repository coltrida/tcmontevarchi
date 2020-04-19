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

    store(user, token, nome, cognome, credito, privilegi, certificato, email, anno){
        this.storeToken(token)
        this.storeUser(user)
        this.storeNome(nome)
        this.storeCognome(cognome)
        this.storeCredito(credito)
        this.storePrivilegi(privilegi)
        this.storeCertificato(certificato)
        this.storeEmail(email)
        this.storeAnno(anno)
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
}

export default AppStorage = new AppStorage()