let auth = 0;

export const basename = (() => {
  return window.app.basename;
})();

export const isAuthenticated = (() => {
  return auth;
});
