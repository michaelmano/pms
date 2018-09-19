const redirect = function redirect(path) {
  if (typeof window.location.replace === 'function') {
    return window.location.replace(path);
  }
  return (window.location.href = path);
};

export default redirect;
