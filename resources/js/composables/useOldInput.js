export function useOldInput(oldData) {
  return function old(inputName, defaultValue = null) {
    const oldInput = oldData[inputName];

    return typeof oldInput === 'undefined'
      ? defaultValue
      : oldInput;
  }
}
