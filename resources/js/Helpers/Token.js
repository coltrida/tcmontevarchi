class Token {
    isValid(token){
        const payload = this.payload(token)
        if(payload){
            return payload.iss == "http://tcmontevarchi2.local/api/auth/login" || "http://tcmontevarchi2.local/api/auth/signup" ? true : false
        }

        return false
    }

    payload(token){
        const payload = token.split('.')[1]
        return this.decode(payload)
    }

    decode(payload){
        if(this.isBase64(payload)){
            return JSON.parse(atob(payload))
        }
        return false
    }

    isBase64(str){
        try{
            return btoa(atob(str)).replace(/=/g,"") == str
        }
        catch(error){
            return false
        }
    }
}

export default Token = new Token()