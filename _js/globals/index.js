export const basename = (() => {
  return window.app.basename;
})();

export const isAuthenticated = (() => {
  return window.sessionStorage.getItem('auth');
});

export const setAuthenticated = (bool => {
  window.sessionStorage.setItem('auth', bool);
});
