export function useTruncateText() {
  return function truncate(text, numbOfChars) {
    if (text.toString().length < numbOfChars) {
      return text;
    }

    return text.substr(text, numbOfChars) + '...';
  }
}
