<template>
    <div class="mt-10">
        <div class="max-w-2xl mx-auto bg-white">
            <form @submit.prevent="register" class="flex flex-col gap-6 shadow-4xl shadow-primary/[0.30] p-6 rounded">
                <BaseInput label="Ime kompanije" v-model="form.companyName" :error="form.errors.companyName" />
                <div class="flex flex-col gap-2">
                    <span>Registrovani ste <span class="text-red-500">*</span></span>
                    <BaseRadio v-model="form.registration" label="u Srbiji (PIB)" name="registration" value="serbia" />
                    <BaseRadio v-model="form.registration" label="u inostranstvu (VATIN ili slično)" name="registration" value="abroad" />
                    <BaseRadio
                        v-model="form.registration"
                        label="nemam pib (u procesu registracije ili ambasade, vrtići..)"
                        name="registration"
                        value="no pib"
                    />
                </div>
                <BaseInput label="PIB" v-model="form.pib" :error="form.errors.pib" />
                <BaseInput label="Matični broj" v-model="form.registrationNumber" :error="form.errors.registrationNumber" />
                <BaseSelect name="Industrija" v-model="form.industry" label="Industry" required :options="industries" />
                <BaseInput label="Telefon" v-model="form.phoneNumber" :error="form.errors.phoneNumber" />
                <BaseInput label="Država" v-model="form.country" :error="form.errors.coutry" />
                <BaseInput label="Poštanski broj" v-model="form.postalCode" :error="form.errors.postalCode" />
                <BaseInput label="Grad" v-model="form.city" :error="form.errors.city" />
                <BaseInput label="Adresa kompanije" v-model="form.companyAddress" :error="form.errors.companyAddress" />
                <p class="text-xl text-primary font-bold">Dodatne informacije</p>
                <BaseSelect name="Veličina kompanije" v-model.number="form.industry" label="Odaberite veličinu kompanije" required :options="industries" />
                <p class="text-xl text-primary font-bold">Lični podaci</p>
                <BaseInput label="Ime" v-model="form.ownerName" :error="form.errors.ownerName" />
                <BaseInput label="Prezime" v-model="form.ownerLastName" :error="form.errors.ownerLastName" />
                <p class="text-xl text-primary font-bold">Podaci za pristup</p>
                <BaseInput label="Email" v-model="form.email" :error="form.errors.email" />
                <BaseInput label="Šifra" v-model="form.password" :error="form.errors.password" />
                <BaseInput label="Ponovi šifru" v-model="form.confirm" :error="form.errors.confirm" />
                <BaseButton :loading="form.processing" type="submit" class="w-full">Submit</BaseButton>
            </form>
        </div>
    </div>
</template>

<script setup>
import BaseInput from '../../../Shared/Base/BaseInput.vue'
import BaseButton from '../../../Shared/Base/BaseButton.vue'
import { useForm } from '@inertiajs/vue3'
import BaseSelect from '../../../Shared/Base/BaseSelect.vue'
import BaseRadio from '../../../Shared/Base/BaseRadio.vue'
import { ref } from 'vue'

defineOptions({
    layout: null
})
const industries = ref([{ label: 'Auto', value: '123' }])
const form = useForm({
    companyName: '',
    pib: '',
    registrationNumber: '',
    industry: '',
    registration: 'serbia',
    phoneNumber: '',
    country: '',
    city: '',
    postalCode: '',
    companyAddress: '',
    ownerName: '',
    ownerLastName: '',
    comnpanySize: '',
    email: '',
    password: '',
    confirm: ''
})

const register = () => {
    form.post('/register-job-poster')
}
</script>

<style scoped></style>
