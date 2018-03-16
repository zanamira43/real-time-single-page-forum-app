import Token from './Token.js'
import AppStorage from './AppStorage.js'

class User {

    login(data) {
        axios.post('/api/auth/login', data)
            .then(res => this.responseAferLogin(res))
            .catch(error => console.log(error))
    }

    responseAferLogin(res) {
        const access_token = res.data.access_token
        const username = res.data.user

        if (Token.isValid(access_token)) {
            AppStorage.store(access_token, username)
        }
    }

    hasToken() {
        const storedToken = AppStorage.getToken()
        if (storedToken) {
            return Token.isValid(storedToken) ? true : false
        }
        return false
    }

    loginedIn() {
        return this.hasToken()
    }

    logout() {
        return AppStorage.clear()
    }

    name() {
        if (this.loginedIn()) {
            return AppStorage.sotreUser()
        }
    }

    id() {
        if (this.loginedIn()) {
            const payload = Token.payload(AppStorage.getToken())
            return payload.sub
        }
    }
}

export default User = new User();