export function useUrlGenerator() {
  return function generate(url, trailingSlashAfterBase = true) {
    if (url.includes('http')) {
      return url;
    }

    return `${process.env.MIX_APP_URL}${trailingSlashAfterBase ? '/' : ''}${url}`;
  }
}
