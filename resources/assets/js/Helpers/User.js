import Token from './Token.js'
import AppStorage from './AppStorage.js'

class User {

    login(data) {
        axios.post('/api/auth/login', data)
            .then(res => {

                this.responseAfterLogin(res)
                this.$router.push({ name: 'forum' })
            })
            .catch(error => console.log(error))
    }

    responseAfterLogin(res) {
        const access_token = res.data.access_token
        const username = res.data.user

        if (Token.isValid(access_token)) {
            AppStorage.store(access_token, username)
            window.location = '/forum'
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
        window.location = '/forum'

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

    own(id) {
        return this.id() == id
    }


    admin() {
        return this.id() == 14
    }
}

export default User = new User();