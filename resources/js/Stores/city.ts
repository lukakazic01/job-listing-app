import { defineStore } from 'pinia'
import { ref } from 'vue'
import type { DbOption } from '../Types/DbOption.ts'

export const useCityStore = defineStore('cities', () => {
    const cities = ref<DbOption[] | null>(null)

    return { cities }
})
