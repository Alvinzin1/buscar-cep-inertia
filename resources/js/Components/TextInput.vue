<script setup>
import { ref, watch } from 'vue';

const props = defineProps({
  required: {
    type: Boolean,
    default: false
  },
  type: {
    type: String,
    default: "text"
  },
  error: String,
  label: String,
  placeholder: String,
  field: String,
  modelValue: [String, Number]
});

// Define a ref para o  modelValue
const modelValue = ref(props.modelValue);

// Observo a prop modelvalue que vem do componente pai
watch(() => props.modelValue, (newValue) => {
  modelValue.value = newValue;
});

// Define a ref para o error prop
const error = ref(props.error);

// Observo a prop error que vem do componente pai
watch(() => props.error, (newError) => {
  error.value = newError;
});
</script>

<template>
  <div>
      <label :for="field" class="form-label">{{ label }}</label>
      <input :type="type" class="form-control" :class="[error ? 'is-invalid' : '']" :id="field" :placeholder="placeholder" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" :required="required">
      <div v-if="error" class="invalid-feedback">{{ error }}</div>
  </div>
</template>
