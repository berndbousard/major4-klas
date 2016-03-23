export const isAuthenticated = (() => {
  return sessionStorage.getItem('auth');
});

export const setAuthenticated = (bool => {
  sessionStorage.setItem('auth', bool);
});
