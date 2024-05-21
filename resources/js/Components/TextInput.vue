<script setup>
import { ref, watch } from 'vue';

const props = defineProps({
  required: {
    type: Boolean,
    default: false
  },
  maxlength: {
    type: Number,
    default: 0
  },
  minlength: {
    type: Number,
    default: 0
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

const modelValue = ref(props.modelValue);

watch(() => props.modelValue, (newValue) => {
  modelValue.value = newValue;
});

const error = ref(props.error);

watch(() => props.error, (newError) => {
  error.value = newError;
});
</script>

<template>
  <div>
      <label :for="field" class="form-label">{{ label }}</label>
      <input :type="type" class="form-control" :class="[error ? 'is-invalid' : '']" :id="field" :placeholder="placeholder" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" :required="required" :minlength="minlength" :maxlength="maxlength">
      <div v-if="error" class="invalid-feedback">{{ error }}</div>
  </div>
</template>
