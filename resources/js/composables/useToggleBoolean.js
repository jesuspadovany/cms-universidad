import { ref, computed } from '@vue/composition-api';

export function useToggleBoolean(initialValue = false) {
  const valueRef = ref(initialValue);

  return {
    value: computed(() => valueRef.value),
    setToFalse: () => valueRef.value = false,
    setToTrue: () => valueRef.value = true,
    toggle: () => valueRef.value = ! valueRef.value,
  };
}
