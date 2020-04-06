export function useMoveArrayItem() {
  function moveUp(array, element) {
    array = array.slice();

    const index = array.indexOf(element);

    if (index === 0) {
      return array;
    }

    array.splice(index, 1);

    array.splice(index - 1, 0, element);

    return array;
  }

  function moveDown(array, element) {
    array = array.slice();

    const index = array.indexOf(element);

    if (index === array.length - 1) {
      return array;
    }

    array.splice(index, 1),

    array.splice(index + 1, 0, element);

    return array;
  }

  return { moveUp, moveDown}
}
