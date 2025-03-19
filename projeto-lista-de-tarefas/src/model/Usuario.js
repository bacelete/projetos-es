class Usuario {
    constructor(id, username, password) {
        this.id = id;
        this.username = username;
        this.password = password;
    }
    getId() {
        return this.id;
    }
    getUsername() {
        return this.username;
    }
}

export default Usuario; 