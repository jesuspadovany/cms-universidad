export function useRangeFromOneToN(numberOfItems) {
  return Array.from(Array(numberOfItems + 1).keys()).slice(1);
}
