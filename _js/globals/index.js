// eventueel private?
// veiliger?
let auth = 0;

export const basename = (() => {
  return window.app.basename;
})();

export const isAuthenticated = (() => {
  return auth;
});

export const setAuthenticated = (bool => {
  auth = bool;
});
