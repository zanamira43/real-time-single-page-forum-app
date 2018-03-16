class AppStorage {
    storeToken(token) {
        localStorage.setItem('token', token)
    }

    sotreUser(user) {
        localStorage.setItem('user', user)
    }

    store(token, user) {
        this.storeToken(token);
        this.sotreUser(user);
    }

    clear() {
        localStorage.removeItem('token')
        localStorage.removeItem('user')
    }

    getToken() {
        return localStorage.getItem('token')
    }

    getUser(user) {
        return localStorage.getItem('user')
    }

}


export default AppStorage = new AppStorage();