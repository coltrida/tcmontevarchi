import Token from './Token'
import AppStorage from './AppStorage'

class User {
    login(data){
        axios.post('/api/auth/login', data)
            .then(res => this.responseAfterLogin(res))
            .catch(error => console.log(error.response.data))
    }

    responseAfterLogin(res){
        const access_token = res.data.access_token
        console.log(access_token)
        const username = res.data.user
        const nome = res.data.nome
        const cognome = res.data.cognome
        const credito = res.data.credito
        const privilegi = res.data.privilegi
        const certificato = res.data.certificato
        const email = res.data.email
        const anno = res.data.anno
        const eta = res.data.eta
        const stato = res.data.stato
        if(Token.isValid(access_token)){
            AppStorage.store(username, access_token, nome, cognome, credito, privilegi, certificato, email, anno, eta, stato)
            window.location = '/'
        }
    }

    hasToken(){
        const storedToken = AppStorage.getToken()
        if(storedToken){
            return Token.isValid(storedToken) ? true : this.logout()
        }
        return false
    }

    loggedIn(){
        return this.hasToken()
    }

    logout(){
        AppStorage.clear()
        window.location = '/'
    }

    name(){
        if(this.loggedIn()){
            return AppStorage.getUser()
        }
    }

    nome(){
        if(this.loggedIn()){
            return AppStorage.getNome()
        }
    }

    cognome(){
        if(this.loggedIn()){
            return AppStorage.getCognome()
        }
    }

    credito(){
        if(this.loggedIn()){
            return AppStorage.getCredito()
        }
    }

    stato(){
        if(this.loggedIn()){
            return AppStorage.getStato()
        }
    }

    privilegi(){
        if(this.loggedIn()){
            return AppStorage.getPrivilegi()
        }
    }

    certificato(){
        if(this.loggedIn()){
            return AppStorage.getCertificato()
        }
    }

    email(){
        if(this.loggedIn()){
            return AppStorage.getEmail()
        }
    }

    anno(){
        if(this.loggedIn()){
            return AppStorage.getAnno()
        }
    }

    id(){
        if(this.loggedIn()){
            const payload = Token.payload(AppStorage.getToken())
            return payload.sub
        }
    }

    own(id){
        return this.id() == id
    }

    admin(){
        return this.id() == 16
    }

    eta(){
        let today = new Date()
        let yyyy = today.getFullYear();
        return (yyyy - this.anno())
    }
}

export default User = new User()