<template>
    <div class="flex flex-col gap-2">
        <label v-if="label" :for="name">{{ label }} <span v-if="required" class="text-red-500">*</span></label>
        <input
            class="border-gray-200 outline-none border rounded p-2"
            v-model="value"
            :class="[disabled && 'cursor-not-allowed bg-gray-100', error && 'border-red-500']"
            :id="name"
            :name
            :type
            :disabled
            :placeholder
        />
        <p v-if="error" class="text-red-500 text-xs">{{ error }}</p>
    </div>
</template>

<script setup lang="ts">
const {
    label,
    name,
    required = true,
    error = '',
    type = 'text',
    disabled = false,
    placeholder
} = defineProps<{
    label?: string
    name?: string
    required?: boolean
    error?: string
    type?: string
    disabled?: boolean
    placeholder: string
}>()
const [value, modifiers] = defineModel<number | string, 'number' | 'trim'>({
    set(v) {
        if (modifiers.number) return typeof v === 'number' && Number(v)
        if (modifiers.trim) return typeof v === 'string' && v.trim()
        return v
    }
})
</script>

<style scoped></style>
