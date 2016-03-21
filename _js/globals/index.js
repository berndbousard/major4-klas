export const basename = (() => {
  return window.app.basename;
})();

export const isAuthenticated = (() => {
  return sessionStorage.getItem('auth');
});

export const setAuthenticated = (bool => {
  sessionStorage.setItem('auth', bool);
});
