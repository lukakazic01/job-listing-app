<template>
    <div class="mt-10">
        <div class="max-w-md mx-auto bg-white">
            <form @submit.prevent="register" class="flex flex-col gap-6 shadow-4xl shadow-primary/[0.30] p-6 rounded">
                <BaseInput placeholder="Email" label="Email" v-model="form.email" :error="form.errors.email" />
                <BaseInput placeholder="Password" type="password" label="Password" v-model="form.password" :error="form.errors.password" />
                <BaseButton :loading="form.processing" type="submit" class="w-full">Submit</BaseButton>
            </form>
        </div>
    </div>
</template>

<script setup>
import BaseInput from '../../../Shared/Base/BaseInput.vue'
import BaseButton from '../../../Shared/Base/BaseButton.vue'
import { useForm } from '@inertiajs/vue3'

defineOptions({
    layout: null
})

const form = useForm({
    email: '',
    password: ''
})

const register = () => {
    form.post('/register-applicant')
}
</script>

<style scoped></style>
