<template>
    <div class="flex gap-2 items-center">
        <RadioButton v-model="model" :input-id="label" :disabled :size :name :value />
        <label v-if="label" :for="label" class="text-sm">{{ label }}</label>
    </div>
</template>

<script setup lang="ts">
import { RadioButton } from 'primevue'
const { name, value, label, size } = defineProps<{
    name: string
    value: string | boolean | number
    label: string
    disabled?: boolean
    size?: 'small' | 'large'
}>()
const model = defineModel<string | number | boolean>()
</script>

<style scoped></style>
