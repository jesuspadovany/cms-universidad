export function useUrlGenerator() {
  return function generate(url) {
    return `${process.env.MIX_APP_URL}/${url}`;
  }
}
