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


/**
 * title get `User`items from `localStorage`
 * 
 * read all items, store them & set `User` -> `true`
 * so we can reload the page without to logout
 */
if (localStorage.getItem('ID') && User !== true) {
    Token.set(localStorage.getItem("Token"));
    ID.set(localStorage.getItem("ID"));
    Role.set(localStorage.getItem("Role"));
    Permission.set(localStorage.getItem("Permission"));
    Avatar.set(localStorage.getItem("Avatar"));
    User.set(true)
}


/**
 * User.login(payload, token)
 * 
 * sets `ID`, `Role`, `Permission`, `Token` & `Avatar` to `localStorage` and `store`
 * sets the `store-Item` `User` -> `true`
 * called by `authUser()` 
 * 
 * @param array & string
 * @return redirect to `/profile`
 */
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
    push('/profile');

}

/**
 * User.logout()
 * 
 * removes all items from `localStorage` & empties all stores
 * called in `layout/Menue.svelte`
 * 
 * @return redirect to login form
 */
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

/**
 * authUser(token)
 * 
 * parse JWT to array and calles `User.login()`
 * 
 * @param JWT from API
 * @return array with payload for `User.login()`
 */
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
    User.login(JSON.parse(jsonPayload), token);
}