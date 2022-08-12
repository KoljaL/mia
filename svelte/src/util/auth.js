// import store & router for redirect after logout
import { writable } from 'svelte/store';
import { push, pop, replace } from 'svelte-spa-router';


// 
// exported vars
//
export var Token = writable(0)
export var ID = writable(0)
export var Role = writable(0)
export var Permission = writable(0)
export var Avatar = writable(0)
export const User = writable(0);


//
// set store vars from localStorage after page reload
//
if (localStorage.getItem('ID') && User !== true) {
    Token.set(localStorage.getItem("Token"));
    ID.set(localStorage.getItem("ID"));
    Role.set(localStorage.getItem("Role"));
    Permission.set(localStorage.getItem("Permission"));
    Avatar.set(localStorage.getItem("Avatar"));
    User.set(true)
}


//
// User login called in Login.svelte
//
User.login = function(payload, token) {
    // console.log(payload)
    Token = writable(token);
    localStorage.setItem("Token", token);
    ID = writable(payload.staff_id);
    localStorage.setItem("ID", payload.staff_id);
    Role = writable(payload.role);
    localStorage.setItem("Role", payload.role);
    Permission = writable(payload.permission);
    localStorage.setItem("Permission", payload.permission);
    Avatar = writable(payload.avatar);
    localStorage.setItem("Avatar", payload.avatar);
    User.set(true)
}


//
// User logout called in Menue.svelte
//
User.logout = function() {
    Token.set(false);
    localStorage.removeItem("Token");
    ID.set(false);
    localStorage.removeItem("ID");
    Role.set(false);
    localStorage.removeItem("Role");
    Permission.set(false);
    localStorage.removeItem("Permission");
    Avatar.set(false);
    localStorage.removeItem("Avatar");
    User.set(false);
    push('/');
}

//
// parse JWT to array and return
//
export const authUser = function(token) {
    var base64Url = token.split('.')[1];
    var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
    var jsonPayload = decodeURIComponent(
        window
        .atob(base64)
        .split('')
        .map(function(c) {
            return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
        })
        .join('')
    );

    // return JSON.parse(jsonPayload);
    User.login(JSON.parse(jsonPayload), token);
}