import { useToggleBoolean } from '@/composables/useToggleBoolean';

export function useToggleModal(initialValue = false) {
  const {
    value: shown,
    setToFalse: hide,
    setToTrue: show,
    toggle
  } = useToggleBoolean(initialValue);

  return {
    shown,
    hide,
    show,
    toggle,
  };
}
