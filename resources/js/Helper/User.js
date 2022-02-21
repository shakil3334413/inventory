import Token from "./Token";
import AppStore from "./AppStore";

class User
{
    // login(data){
    //     axios.post('api/auth/login',data)
    //     .then(res=>this.responseAfterLogin(res))
    //     .catch(error=>console.log(error.response.data))
    // }

    responseAfterLogin(res){
        const access_token=res.data.access_token
        const username=res.data.name
        if(Token.isValid(access_token)){
            AppStore.store(access_token,username);
        }
    }


    hasToken()
    {
        const storeToken=AppStore.getToken();
        if(storeToken){
            return Token.isValid(storeToken) ? true :false
        }

        return false
    }

    loggedIn()
    {
        return this.hasToken()
    }

    loggOut()
    {
        AppStore.clear()
    }

    name()
    {
        if(this.loggedIn()){
            return localStorage.getItem('user');
        }
    }

    id(){
        if(this.loggedIn()){
            const payload=Token.payload(localStorage.getItem('token'))
            return payload.sub
        }
        return false
    }
}

export default User=new User();
