import { computed } from '@vue/composition-api';

export function useCustomCheckbox(props, emit) {
  if (!props.hasOwnProperty('checked')) {
    console.error('useCustomCheckbox: "checked" prop is required');
  }

  const checkedPropIsArray = computed(() => Array.isArray(props.checked));

  const isChecked = computed(() => {
    if (checkedPropIsArray.value) {
      return props.checked.includes(props.value);
    }

    return props.checked;
  });

  function onChange(event) {
    if (! checkedPropIsArray.value) {
      emit('change', event.target.checked);
      return;
    }

    const checkedArray = [].concat(props.checked);

    if (checkedArray.includes(props.value)) {
      const valueIndex = checkedArray.indexOf(props.value);
      checkedArray.splice(valueIndex, 1);
    } else {
      checkedArray.push(props.value);
    }
    emit('change', checkedArray);
  }

  return {
    isChecked,
    onChange
  }
}
