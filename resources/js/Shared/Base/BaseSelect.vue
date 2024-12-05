<template>
    <div class="flex flex-col gap-2">
        <label v-if="props.label">
            {{ props.label }}
            <span v-if="props.required" class="text-red-500">*</span>
        </label>
        <div class="w-full relative select" :class="[!options && 'loading']">
            <Select
                :id="props.name"
                :placeholder="props.placeholder || props.label"
                v-model="value"
                :name="props.name"
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

const props = defineProps<{
    name: string
    label?: string
    placeholder?: string
    required?: boolean
    options: Option[]
    error?: string
}>()
const [value, modifiers] = defineModel<number | string | null, 'number'>({
    set(v) {
        if (modifiers.number) return Number(v)
        return v
    }
})
</script>

<style scoped>
.loading {
    @apply cursor-not-allowed relative text-white;

    &:before {
        @apply animate-spin content-[''] z-50 inset-0 absolute w-6 h-6 m-auto border-4 border-transparent border-t-primary rounded-full;
    }
}
</style>
