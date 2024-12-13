<template>
    <div class="flex flex-col gap-2">
        <label v-if="label">
            {{ label }}
            <span v-if="required" class="text-red-500">*</span>
        </label>
        <div class="w-full relative select" :class="[!options && 'loading']">
            <Select
                :id="name"
                :filter
                :name
                :placeholder="placeholder || label"
                v-model="value"
                :options="options"
                :disabled="!options || !options.length"
                :data-error="error || undefined"
                option-label="label"
                option-value="value"
                :class="[error && '!border-red-500', !options && 'dark:text-white']"
                class="w-full select outline-none border border-1 bg-white rounded placeholder:text-gray-300"
            >
            </Select>
        </div>
        <div v-if="error" class="text-xs text-red-500">
            {{ error }}
        </div>
    </div>
</template>

<script setup lang="ts">
import Select from 'primevue/select'
interface Option {
    label: string
    value: string
}

const {
    name,
    label,
    placeholder,
    required = false,
    options,
    error,
    filter = false
} = defineProps<{
    name: string
    label?: string
    placeholder?: string
    required?: boolean
    options: Option[]
    error?: string
    filter?: boolean
}>()
const [value, modifiers] = defineModel<number | string | null, 'number'>({
    set(v) {
        if (modifiers.number) return Number(v)
        return v
    }
})
</script>

<style>
.loading {
    @apply cursor-not-allowed relative text-white;

    &:before {
        @apply content-[''] z-50 inset-0 absolute w-6 h-6 m-auto border-4 border-t-primary rounded-full animate-spin;
    }
}
</style>
