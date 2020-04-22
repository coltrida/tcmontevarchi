import User from './User'

class Prenotazioni {
    etaUnder(){
        return 18
    }

    etaOver(){
        return 60
    }

    prezzoStandardSingolo(){
        return 5.5
    }

    prezzoStandardDoppio(){
        return 4
    }

    prezzoUnder(){
        return 3
    }

    prezzoOver(){
        return 5
    }

    prezzoNonSocio(){
        return 10
    }
}

export default Prenotazioni = new Prenotazioni()