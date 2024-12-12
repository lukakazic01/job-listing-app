import { defineStore } from 'pinia'
import { ref } from 'vue'
import type { DbOption } from '../Types/DbOption.ts'

export const useCompanySizeStore = defineStore('companySize', () => {
    const companySizes = ref<DbOption[] | null>(null)

    return { companySizes }
})
